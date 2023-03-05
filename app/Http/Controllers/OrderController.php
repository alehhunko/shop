<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
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
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $quantity++,
            'price' => $product->price,
            'weight' => 0,
            'options' => [
                'category_id' => $product->category_id,
                'code' => $product->code,
                'description' => $product->description,
                'image' => $product->image,
            ]
        ])->associate('App\Models\Product');
        return redirect()->route('shopping_cart');
    }

    public function updateCart(Request $request)
    {
        Cart::instance('default')->update($request->rowId, $request->quantity);
        return back();
    }

    public function removeFromCart($id)
    {
        Cart::instance('default')->remove($id);
        return back();
    }

    public function order()
    {
        return view('order', [
            'session_count' => Cart::instance('default')->count(),
            'categories' => Category::get(),
        ]);
    }

    public function orderUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
        ]);
        $order = Order::create($data);
        $session_products = Cart::instance('default')->content()->all();
        foreach ($session_products as $product) {
            $order->products()->attach($product->id, ['count' => $product->qty]);
            session()->flash('success', 'To confirm the order, enter your name and phone number and we will contact you.');
            Cart::destroy();
            return redirect()->route('order');
    }
}
