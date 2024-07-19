<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        $data = Product::query()->get();
        return view('users.index', compact('data'));
    }

    public function detail(Product $product){
        return view('users.product_detail', compact('product'));
    }

    public function cate(){
        return view('users.pro_by_cate');
    }
}
