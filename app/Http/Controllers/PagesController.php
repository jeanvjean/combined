<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Design;


class PagesController extends Controller
{
    public function getIndex()
    {
        $designs = Design::orderBy('created_at','desc')->limit(4)->get();
        $products=Product::all();
        return view('welcome')->withProducts($products)->withDesigns($designs);
    }
    public function getContact(){
         return view('contact');

     }
     public function postContact(Request $request){
         $this->validate($request,
         [
             'email'=>'required|email',
             'subject'=>'min:3',
             'message'=>'min:10' ]);

             $data=[
                 'email'=>$request->email,
                 'subject'=>$request->subject,
                 'bodyMessage'=>$request->message
             ];

             Mail::send('emails.contact',$data, function($message)use($data){
                 $message->from($data['email']);
                 $message->to('fjohn087@gmail.com');
                 $message->name($data['name']);
             });

             Session::flash('success','Mail Sent');

             return redirect('/');

     }
     public function showDesign()
     {
         $designs = Design::all();
         return view('designs.designs')->withDesigns($designs);
     }
}
