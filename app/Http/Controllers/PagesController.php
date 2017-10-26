<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PagesController extends Controller
{
    public function getIndex()
    {
        $products=Product::all();
        return view('welcome')->withProducts($products);
    }
}
