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
        return view('index',[
            'session_count' => Cart::instance('default')->count(),
            'products'=>Product::get(), 
            'categories'=>Category::get(),
        ]);
    }

    public function shoppingCart()
    {
        return view('shopping_cart', [
            'session_products' => Cart::instance('default')->content()->all(),
            'session_total' => Cart::instance('default')->total(),
            'session_count' => Cart::instance('default')->count(),
            'categories' => Category::get(),
        ]);
    }

    public function addToCart(Request $request)
    {
        $quantity = $request->quantity ?? 1;
        $product = Product::where('id', $request->id)->first();
        Cart::instance('default')->add([
            'id' =>$product->id,
            'name' =>$product->name,
            'qty' =>$quantity++,
            'price' =>$product->price,
            'weight' =>0,
            'options' =>[
                'category_id' => $product->category_id,
                'code' => $product->code,
                'description' => $product->description,
                'image' => $product->image,
            ]
        ])->associate('App\Models\Product');
        return redirect()->route('shopping_cart');
    }

    public function order()
    {
        return view('order', [
            'session_count' => Cart::instance('default')->count(),
            'categories'=>Category::get(),
        ]);
    }

    public function category($data)
    {
        return view('category', [
            'session_count' => Cart::instance('default')->count(),
            'category'=> Category::where('name', $data)->first(), 
            'categories'=> Category::get(),
        ]);
    }

    public function productCart($category, $product)
    {
        return view('product_cart', [
            'session_count' => Cart::instance('default')->count(),
            'categories'=> Category::get(), 
            'product'=> Product::where('code', $product)->first(),
        ]);
    }
}
