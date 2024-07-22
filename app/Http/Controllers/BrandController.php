<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use Str;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::count();

        return view('brands.index', [
            'brands' => $brands,
        ]);
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(StoreBrandRequest $request)
    {
        Brand::create([
            "user_id"=>auth()->id(),
            "name" => $request->name,
            "slug" => Str::slug($request->name)
        ]);

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand has been created!');
    }

    public function show(Brand $brand)
    {
        return view('brands.show', [
            'brand' => $brand
        ]);
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', [
            'brand' => $brand
        ]);
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update([
            "name" => $request->name,
            "slug" => Str::slug($request->name)
        ]);

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand has been updated!');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand has been deleted!');
    }
}
