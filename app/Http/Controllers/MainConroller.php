<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainConroller extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function product($product)
    {
        return view('product');
    }

    public function category($data)
    {
        $category = Category::where('code', $data)->first();
        return view('category', compact('category'));
    }
}
