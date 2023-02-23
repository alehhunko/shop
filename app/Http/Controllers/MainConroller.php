<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
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
        return view('shopping_cart', [
            'categories' => Category::get(),
            'session' => Cart::instance('default')->content()->first(),
        ]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $cart = Cart::instance('default')->add(
            $product->id,
            $product->name,
            $request->quantity ?? 1,
            $product->price,
            0,
            [
                'category_id' => $product->category_id,
                'code' => $product->code,
                'description' => $product->description,
                'image' => $product->image,
            ]
        );
        $categories = Category::get();
        return redirect()->route('shopping_cart');
    }

    public function order()
    {
        $categories = Category::get();
        return view('order', compact('categories'));
    }

    public function category($data)
    {
        $category = Category::where('name', $data)->first();
        $categories = Category::get();
        return view('category', compact('category', 'categories'));
    }

    public function productCart($category, $product)
    {
        $product = Product::where('code', $product)->first();
        $categories = Category::get();
        return view('product_cart', compact('categories', 'product'));
    }
}
