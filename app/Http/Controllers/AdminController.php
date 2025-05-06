<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    // Products
    public function view_products()
    {
        $products = Product::all();
        return view('admin.products')->with('products', $products);
    }

    public function view_create_product()
    {
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();

        return view('admin.products-create')->with(['brands' => $brands, 'colors' => $colors, 'sizes' => $sizes]);
    }

    // Brands
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

    // Categories
    public function view_categories()
    {
        $categories = Category::all();
        return view('admin.categories')->with('categories', $categories);
    }

    public function view_create_category()
    {
        return view('admin.categories-create');
    }

    public function create_category(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Category::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);
        return redirect()->route('admin.categories');
    }

    public function delete_category($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories');
    }

    public function view_edit_category($id)
    {
        $category = category::findOrFail($id);
        return view('admin.categories-edit')->with('category', $category);
    }

    public function edit_category(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);
        return redirect()->route('admin.categories');
    }
}
