<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class MainConroller extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validate([
            'name' => 'string',
        ]);
        $query = Product::query();
        if (isset($data['name'])) {
            $query->where('name', 'like', "%{$data['name']}%");
        }

        return view('index', [
            'session_count' => Cart::instance('default')->count(),
            'products' => $query->get(),
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
