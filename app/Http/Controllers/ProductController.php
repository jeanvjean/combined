<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Category;
use App\Cart;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('products.index')->withProducts($products);
    }

    Public function getAddToCart(Request $request,$id)
    {
            $products=Product::find($id);
            $oldCart=Session::has('cart')? Session::get('cart') :null;
            $cart=new Cart($oldCart);
            $cart->add($products,$products->id);

            $request->session()->put('cart',$cart);

            return redirect()->route('products.index');
    }
    public function getCart(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart= Session::get('cart');
        $cart =new Cart($oldCart);

        return view('shop.shopping-cart',['products'=>$cart->items, 'totalPrice'=>
    $cart->totalPrice]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('products.create')->withCategories($categories);
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
            'price'=>'required'
        ]);


        $product=new Product;

        $product->name=$request->name;
        $product->description=$request->description;
        $product->category_id=$request->category_id;
        $product->price=$request->price;

        $product->save();

        Session::flash('success','Saved');
        return redirect()->route('products.show', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        return view('products.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view('products.edit')->withProduct($product);
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
            'product'=>'required',
            'description'=>'required|min:5|max:1000',
            'category_id'=>'required',
            'price'=>'required'
        ]);
        $product= Product::find($id);

        $product->product=$request->input('product');
        $product->description=$request->input('description');
        $product->category_id=$request->input('category_id');
        $product->price=$request->input('price');

        $product->save();
        Session::flash('success','Update Successfull');
        return redirect()->route('products.show',$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);

        $product->delete();

        Session::flash('success', 'Deleted');
        return redirect()->route('products.index');

    }
    public function getCheckout(){
        if (!Session::has('cart')){
            $oldCart = Session::get('cart');
            $cart= new Cart($oldCart);
            $total = $cart->totalPrice;

            return view('shop.checkout',['total'=>$total]);
        }
    }
}