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
            'session' => Cart::instance('default')->content()->all(),
            'categories' => Category::get(),
        ]);
    }

    public function addToCart(Request $request)
    {
        $quantity = $request->quantity;
        $product = Product::where('id', $request->id)->first();
        Cart::instance('default')->add([
            'id' =>$product->id,
            'name' =>$product->name,
            'qty' =>$quantity++ ?? 1,
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
