<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Design;
use Auth;
use Session;
use App\Category;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         $this->validate($request,[
             'name'=>'required',
             'description'=>'required|min:5|max:1000',
             'category_id'=>'required|integer',
             'design_img'=>'required|max:1990'
         ]);
         if($request->hasFile('design_img')){
             $filenameWithExt = $request->file('design_img')->getClientOriginalName();
             $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
             $extension = $request->file('design_img')->getClientOriginalExtension();
             $fileNameToStore = $filename.'.'.time().'.'.$extension;
             $path = $request->file('design_img')->storeAs('public/designs', $fileNameToStore);
         }
         $design=new Design;

         $design->name=$request->name;
         $design->design_img=$fileNameToStore;
         $design->description=$request->description;
         $design->category_id=$request->category_id;

         Auth::user()->design()->save($design);

         Session::flash('success','Saved');
         return back();
     }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
         $design=Design::find($id);
         return view('designs.show')->withDesign($design);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {
         $categories = Category::all();
         $design=Design::find($id);
         return view('designs.edit')->withDesign($design)->withCategories($categories);
     }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required|min:5|max:1000',
            'category_id'=>'required|integer',
            'design_img'=>'required|max:1990'
        ]);
        if($request->hasFile('design_img')){
            $filenameWithExt = $request->file('design_img')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('design_img')->getClientOriginalExtension();
            $fileNameToStore = $filename.'.'.time().'.'.$extension;
            $path = $request->file('design_img')->storeAs('public/designs', $fileNameToStore);
        }
        $design = Design::find(Input::all($id));

        $design->name=$request->name;
        $design->design_img=$fileNameToStore;
        $design->description=$request->description;
        $design->category_id=$request->category_id;

        Auth::user()->design()->save($design);

        Session::flash('success','Saved');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $design= Design::find($id);
        $design->delete();

        Session::flash('success','Design Deleted');
        return redirect()->route('profiles.index');
    }
}
