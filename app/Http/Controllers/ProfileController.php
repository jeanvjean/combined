<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Profile;
use App\Design;
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
        /*$userData = DB::table('users')
    ->leftJoin('profiles', 'profiles.user_id','users.id')
    ->where('slug', $slug)
    ->get();*/
        $designs=Auth::user()->design;
        $categories=Category::all();
        return view('profile.index')->with('data',Auth::user()->profile)
        ->withCategories($categories)
        ->withDesigns($designs)/*->withUserData($userData)*/;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeImage()
    {
        return view('profile.profileImage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function uploadImage(Request $request) {
     $file = $request->file('img');
     $filename = $file->getClientOriginalName();
     $path = 'public/img';
     $file->move($path, $filename);
     $user_id = Auth::user()->id;
     DB::table('users')->where('id', $user_id)->update(['img' => $filename]);
     //return view('profile.index');
     return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile($slug)
    {
        return view('profile.editProfile')->with('data',Auth::user()->profile);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {

        /*$user_id = Auth::user()->id;

        DB::table('profiles')->where(['user_id', $user_id])->update($request->except('_token'));*/
            $this->validate($request,[
            'country'=>'required',
            'city'=>'required',
            'brand'=>'required',
            'website'=>'required',
            'work_email'=>'required',
            'phone_no'=>'required|max:11',
            'about'=>'required|max:2000'
        ]);

        $profile=Profile::find(Auth::user()->id);

        $profile->country=$request->country;
        $profile->city=$request->city;
        $profile->brand=$request->brand;
        $profile->website=$request->website;
        $profile->work_email=$request->work_email;
        $profile->phone_no=$request->phone_no;
        $profile->about=$request->about;

        $profile->save();

        Session::flash('success','Your Profile has been Updated');
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
                         ->where('followers.requested', '=', $uid)->get()
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
