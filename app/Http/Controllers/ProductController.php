<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Profile;
use Auth;
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
         $products=Product::orderBy('created_at', 'desc')->limit(8)->get();
        return view('products.index')->withProducts($products);
    }

    Public function getAddToCart(Request $request,$id)//add product to cart
    {
            $product=Product::find($id);
            $oldCart=Session::has('cart') ? Session::get('cart') : null;
            $cart=new Cart($oldCart);
            $cart->add($product,$product->id);

            $request->session()->put('cart',$cart);

            return redirect()->route('products.index');
    }
    public function removeOne($id)//reduce cart qty
    {
        $oldCart=Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->remove($id);

        if (count($cart->items)>0) {
            Session::put('cart',$cart);
        }else {
            Session::forget('cart');
        }
        return redirect()->route('products.shoppingCart');
    }
    public function removeAll($id)//empty the cart
    {
        $oldCart=Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->clear($id);

        if (count($cart->items)>0) {
            Session::put('cart',$cart);
        }else {
            Session::forget('cart');
        }
        return redirect()->route('products.shoppingCart');
    }

    public function getCart()//return Cart view
    {
        $products = Product::all();
        if(Session::has('cart')){
            return view('shop.shopping-cart')->withProducts($products);
        }
        $oldCart= Session::get('cart');
        $cart =new Cart($oldCart);
        $totalPrice = $cart->totalPrice;


        return view('shop.shopping-cart',['products'=>$cart->items]);
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
            'price'=>'required',
            'image'=>'required|max:1990'
        ]);
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'.'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);
        }else{
            $fileNameToStore = noimage.jpg;
        }



        $product=new Product;

        $product->name=$request->name;
        $product->image=$fileNameToStore;
        $product->description=$request->description;
        $product->category_id=$request->category_id;
        $product->price=$request->price;

        Auth::user()->product()->save($product);

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

    public function destroy($id)
    {
        $product=Product::find($id);

        $product->delete();

        Session::flash('success', 'Deleted');
        return redirect()->route('products.index');

    }
    public function getCheckout(){
        if (Session::has('cart')){
            $oldCart = Session::get('cart');
            $cart= new Cart($oldCart);
            $total = $cart->totalPrice;

            return view('shop.checkout')->withTotal($total);
        }
    }
}
