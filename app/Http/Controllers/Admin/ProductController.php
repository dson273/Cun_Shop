<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    const PATH_VIEW = 'admin.products.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::query()->with(['category'])->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->except('image');
        $data['is_active'] = isset($request->is_active) ? 1 : 0;
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('products', $request->file('image'));
        } else {
            $data['image'] = '';
        }
        Product::query()->create($data);
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('category', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->except('image');
        $data['is_active'] = isset($request->is_active) ? 1 : 0;
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('products', $request->file('image'));
            //Xoá ảnh cũ
            if (!empty($product->image) && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }
        } else {
            $data['image'] = $product->image;
        }
        $product->update($data);
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        //Xoá ảnh cũ
        if (!empty($product->image) && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }
        return back();
    }
}
