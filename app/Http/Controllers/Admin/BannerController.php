<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->except('image');
        if($request->hasFile('image')){
            $data['image'] = Storage::put('banners', $request->file('image'));
        } else{
            $data['image'] = '';
        }
        Banner::query()->create($data);
        return redirect()->route('admin.banners.index')->with('success', 'Thêm mới thành công');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->except('image');
        if($request->hasFile('image')){
            $data['image'] = Storage::put('banners', $request->file('image'));
            //Xoá ảnh cũ
            if(!empty($banner->image) && Storage::exists($banner->image)){
                Storage::delete($banner->image);
            }
        } else{
            $data['image'] = $banner->image;
        }
        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        //Xoá ảnh cũ
        if (!empty($banner->image) && Storage::exists($banner->image)) {
            Storage::delete($banner->image);
        }
        return back();
    }
}
