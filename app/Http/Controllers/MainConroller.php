<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainConroller extends Controller
{
    public function index()
    {
        $products = Product::get();
        $categories = Category::get();
        return view('index', compact('products', 'categories'));
    }

    public function shoppingCart()
    {
        $categories = Category::get();
        return view('shopping_cart', compact('categories'));
    }

    public function productCart($category, $product)
    {
        $product_options=Product::where('code', $product)->first();
        $categories = Category::get();
        return view('product_cart', compact('categories', 'product_options'));
    }

    public function category($data)
    {
        $category = Category::where('name', $data)->first();
        $categories = Category::get();
        return view('category', compact('category', 'categories'));
    }
}
