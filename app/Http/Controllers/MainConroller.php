<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainConroller extends Controller
{
    public function index()
    {
        $products=Product::get();
        // $productCategory=$products->category;
        // dd($productCategory);
        return view('index', compact('products'));
    }

    public function shoppingCart()
    {
        return view('shopping_cart');
    }

    public function productCart($category, $product)
    {
        return view('product_cart');
    }

    public function category($data)
    {
        $category = Category::where('code', $data)->first();
        return view('category', compact('category'));
    }
}
