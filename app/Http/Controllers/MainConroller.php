<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainConroller extends Controller
{
    public function index(Request $request)
    {
        Session::put('old_name', ['name'=>$request->name, 'max'=>$request->price_max, 'min'=>$request->price_min]);
        $data= $request->validate([
            'name' => 'string|max:255|nullable',
        ]);
        $query = Product::query();
        if (isset($data['name'])) {
            $query->where('name', 'like', "%{$data['name']}%");
        }

        if (isset($request->price_min) && isset($request->price_max)) {
            $query->whereBetween('price', [$request->price_min, $request->price_max]);
        }

        return view('index', [
            'max_price' => Product::max('price'),
            'session_count' => Cart::instance('default')->count(),
            'products' => $query->get(),
            'categories' => Category::get(),
        ]);
    }

    public function category(Request $request)
    {
        Session::put('old_name', ['name'=>$request->name, 'max'=>$request->price_max, 'min'=>$request->price_min]);
        $data= $request->validate([
            'name' => 'string|max:255|nullable',
        ]);
        $query = Product::query()->where('category_id', $request->category_id);
        if (isset($data['name'])) {
            $query->where('name', 'like', "%{$data['name']}%");
            dd($query->get());
        }

        if (isset($request->price_min) && isset($request->price_max)) {
            $query->whereBetween('price', [$request->price_min, $request->price_max]);
        }
        return view('category', [
            'max_price' => Product::max('price'),
            'session_count' => Cart::instance('default')->count(),
            'category' => Category::where('name', $request->category)->first(),
            'categories' => Category::get(),
            'products' => $query->get(),
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
