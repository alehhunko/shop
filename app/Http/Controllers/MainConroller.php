<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class MainConroller extends Controller
{
    public function index()
    {
        $products = Product::get();
        $categories = Category::get();
        return view('index', [
            'session_count' => Cart::instance('default')->count(),
            'products' => Product::get(),
            'categories' => Category::get(),
        ]);
    }

    public function category($data)
    {
        return view('category', [
            'session_count' => Cart::instance('default')->count(),
            'category' => Category::where('name', $data)->first(),
            'categories' => Category::get(),
        ]);
    }

    public function productCart($category, $product)
    {
        return view('product_cart', [
            'session_count' => Cart::instance('default')->count(),
            'categories' => Category::get(),
            'product' => Product::where('code', $product)->first(),
        ]);
    }
}
