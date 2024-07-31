<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.promotions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'discount' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
        ]);

        $promotion = Promotion::create($request->only('title', 'discount', 'start_date', 'end_date'));
        $promotion->products()->sync($request->products);

        return redirect()->route('admin.promotions.index')->with('success', 'Khuyến mãi đã được tạo.');
    }

    public function edit(Promotion $promotion)
    {
        $products = Product::all();
        return view('admin.promotions.edit', compact('promotion', 'products'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'discount' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
        ]);

        $promotion->update($request->only('title', 'discount', 'start_date', 'end_date'));
        $promotion->products()->sync($request->products);

        return redirect()->route('admin.promotions.index')->with('success', 'Khuyến mãi đã được cập nhật.');
    }

    public function destroy(Promotion $promotion)
{
    // Xóa tất cả liên kết giữa khuyến mãi và sản phẩm
    $promotion->products()->detach();

    // Xóa khuyến mãi
    $promotion->delete();

    return redirect()->route('admin.promotions.index')->with('success', 'Khuyến mãi đã được xóa.');
}
}
