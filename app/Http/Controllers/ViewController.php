<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $data = Product::query()->get();
        return view('users.index', compact('data'));
    }

    public function detail(Product $product)
    {
        return view('users.product_detail', compact('product'));
    }


    public function cate(Request $request)
    {
        $categoryId = $request->query('category');
        $categories = Category::all(); // Lấy tất cả danh mục
        $productsQuery = Product::query(); // Tạo query cho sản phẩm

        $currentCategory = null;

        if ($categoryId) {
            $productsQuery->where('category_id', $categoryId); // Lọc sản phẩm theo danh mục
            $currentCategory = Category::find($categoryId); // Lấy danh mục hiện tại
        }

        $products = $productsQuery->get(); // Lấy sản phẩm theo điều kiện

        return view('users.pro_by_cate', compact('categories', 'products', 'currentCategory'));
    }

    public function login(){
        return view('users.login');
    }

    public function register(){
        return view('users.register');
    }
}
