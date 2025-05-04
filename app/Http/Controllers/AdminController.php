<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_products()
    {
        $products = Product::all();
        return view('admin.products')->with('products', $products);
    }

    public function view_create_product()
    {
        $brands = Brand::all();
        return view('admin.products-create')->with('brands', $brands);
    }

    public function view_brands()
    {
        $brands = Brand::all();
        return view('admin.brands')->with('brands', $brands);
    }

    public function view_create_brand()
    {
        return view('admin.brands-create');
    }

    public function create_brand(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $brand = Brand::create([
            'name' => $validated['name'],
        ]);
        return redirect()->route('admin.brands');
    }

    public function delete_brand($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('admin.brands');
    }

    public function view_edit_brand($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands-edit')->with('brand', $brand);
    }

    public function edit_brand(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update([
            'name' => $validated['name'],
        ]);
        return redirect()->route('admin.brands');
    }
}
