<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Design;
use App\User;
use Auth;
use Session;
use App\Category;

class DesignController extends Controller
{
     public function store(Request $request)
     {
         $this->validate($request,[
             'name'=>'required',
             'description'=>'required|min:5|max:1000',
             'category_id'=>'required|integer',
             'design_img'=>'required|max:1990'
         ]);
         if($request->hasFile('design_img')){
             $design_img=$request->file('design_img');
             foreach ($design_img as $design) {
                 $extension =$design->getClientOriginalExtension();
                 $filename=str_random(5)."-".date('his')."-".str_random(3).".".$extension;
                 $path = 'storage/designs';
                 $design->move($path,$filename);
             }
         }
         $design=new Design;

         $design->name=$request->name;
         $design->design_img=$filename;
         $design->description=$request->description;
         $design->category_id=$request->category_id;

         Auth::user()->design()->save($design);

         Session::flash('success','Saved');
         return back();
     }
    public function destroy($id)
    {
        $design= Design::find($id);
        $design->delete();

        Session::flash('success','Design Deleted');
        return back();
    }
}
