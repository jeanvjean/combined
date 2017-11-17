<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;
use App\Profile;
use App\Design;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;
use App\Notification;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $categories = Category::all();
        $user = User::where('slug',$slug)->first();
        $products = Product::where('user_id',$user->id)->paginate('5');
        $designs = Design::where('user_id',$user->id)->paginate('4');
        return view('profile.index')->withUser($user)
        ->withDesigns($designs)
        ->withCategories($categories)
        ->withProducts($products);
    }
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit')->with('data',Auth::user()->profile)->withUser($user);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'city'=>'required',
            'country'=>'required',
            'address'=>'required',
            'phone_no'=>'required',
            'about'=>'required',
            'brand'=>'nullable',
            'work_email'=>'nullable',
            'website'=>'nullable',

        ]);
        Auth::user()->profile()->update([
            'city'=>$request->city,
            'country'=>$request->country,
            'address'=>$request->address,
            'phone_no'=>$request->phone_no,
            'about'=>$request->about,
            'brand'=>$request->brand,
            'work_email'=>$request->work_email,
            'website'=>$request->website
        ]);
        if ($request->hasFile('img')) {
            Auth::user()->update([
                'img'=>$request->img->store('public/profile-image')
            ]);
        }

        Session::flash('success','Profile Updated');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function findFriends() {

           $uid = Auth::user()->id;
           $allUsers = DB::table('profiles')
           ->leftJoin('users', 'users.id', '=', 'profiles.user_id')
           ->where('users.id', '!=', $uid)/*->orderBy('profiles.created_at', 'desc')
           ->limit(4)*/->get();

           return view('profile.findFriends', compact('allUsers'));
     }
     public function sendRequest($id)//follow//
     {

         Auth::user()->addFriend($id);

         $uid= Auth::user()->id;

         $FriendRequests = DB::table('followers')
                         ->rightJoin('users', 'users.id', '=', 'followers.requester')
                         ->where('followers.requested', '=', $uid)
                         ->where('status', '=', 1)->get();


         $notifications = new Notification;

         $notifications->followed = $id; // who is accepting my request
         $notifications->follower = Auth::user()->id; // me
         $notifications->status = '1'; // unread notifications
         $notifications->message = 'started following you'; // unread notifications

         $notifications->save();

         Session::flash('success', 'Followed');
         return back();
    }
    public function followers()
    {
       $uid = Auth::user()->id;

       $FriendRequests = DB::table('followers')
                       ->rightJoin('users', 'users.id', '=', 'followers.requester')
                       ->where('status', '=', 1)
                       ->where('followers.requested', '=', $uid)->get();
       return view('profile.requests', compact('FriendRequests'));
    }
    public function notifications($id) {

       $uid = Auth::user()->id;
      $messages = DB::table('notifications')
              ->leftJoin('users', 'users.id', 'notifications.follower')
              ->where('notifications.id', $id)
              ->where('followed', $uid)
              ->orderBy('notifications.created_at', 'desc')
              ->get();

              $updateMsg = DB::table('notifications')
                                  ->where('notifications.id', $id)
                                  ->update(['status'=> 0]);

     return view('profile.notification', compact('messages'));
  }
    /*public function accept($name, $id)
    {

       $uid = Auth::user()->id;
       $checkRequest = Follower::where('requester', $id)
               ->where('requested', $uid)
               ->first();
       if ($checkRequest = 'null') {
           // echo "yes, update here";

           $updateFriendship = DB::table('followers')
                   ->where('requested', $uid)
                   ->where('requester', $id)
                   ->update('status', '=', 1);


            /*$notifications = new Notification;
            $notifications->followed = $id; // who is accepting my request
            $notifications->follower = Auth::user()->id; // me
            $notifications->status = '1'; // unread notifications
            $notifications->save();

            return back();
        }
     }*/
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unfollow($id)/*unfollow*/
    {
          $loggedUser = Auth::user()->id;


          DB::table('followers')
          ->where('requester', $loggedUser)
          ->where('requested', $id)
          ->delete();

          Session::flash('success','UnFollowed');
          return back();
    }
}
