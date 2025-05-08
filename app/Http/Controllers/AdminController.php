<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Size;
use App\Models\SKU;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    private function validateProductRequest(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:65535',
            'brand_id' => 'required|exists:brands,id',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'collections' => 'nullable|array',
            'collections.*' => 'exists:collections,id',
            'product_images' => 'nullable|array|max:5',
            'product_images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'sku' => 'required|array',
            'sku.*' => 'required|string|max:20',
            'size_id' => 'required|array',
            'size_id.*' => 'required|exists:sizes,id',
            'color_id' => 'required|array',
            'color_id.*' => 'required|exists:colors,id',
            'amount_in_stock' => 'required|array',
            'amount_in_stock.*' => 'required|integer|min:0',
            'sku_id' => 'nullable|array',
            'sku_id.*' => 'nullable|exists:skus,id',
        ];
        return $request->validate($rules);
    }

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
        $categories = Category::all();
        $collections = Collection::all();

        return view('admin.products-create')->with([
            'brands' => $brands,
            'colors' => $colors,
            'sizes' => $sizes,
            'categories' => $categories,
            'collections' => $collections
        ]);
    }

    public function create_product(Request $request)
    {
        $validated = $this->validateProductRequest($request);

        if (count($validated['sku']) !== count($validated['size_id']) ||
            count($validated['sku']) !== count($validated['color_id']) ||
            count($validated['sku']) !== count($validated['amount_in_stock'])) {
            return back()->withErrors(['sku' => 'All SKU fields must be filled.'])->withInput();
        }

        $product = Product::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'price' => $validated['price'],
            'description' => $validated['description'],
            'brand_id' => $validated['brand_id'],
        ]);

        if (!empty($validated['categories'])) {
            $product->categories()->attach($validated['categories']);
        }

        if (!empty($validated['collections'])) {
            $product->collections()->attach($validated['collections']);
        }

        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $index => $image) {
                $path = $image->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $path,
                    'order' => $index + 1,
                ]);
            }
        }

        foreach ($validated['sku'] as $index => $skuCode) {
            Sku::create([
                'product_id' => $product->id,
                'sku' => $skuCode,
                'amount_in_stock' => $validated['amount_in_stock'][$index],
                'color_id' => $validated['color_id'][$index],
                'size_id' => $validated['size_id'][$index],
            ]);
        }

        return redirect()->route('admin.products');
    }

    public function view_edit_product($id)
    {
        $product = Product::with(['skus', 'categories', 'collections', 'brand', 'images'])->findOrFail($id);
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        $categories = Category::all();
        $collections = Collection::all();

        return view('admin.products-edit')->with([
            'product' => $product,
            'brands' => $brands,
            'colors' => $colors,
            'sizes' => $sizes,
            'categories' => $categories,
            'collections' => $collections,
        ]);
    }

    public function edit_product(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $validated = $this->validateProductRequest($request, $id);

        if (count($validated['sku']) !== count($validated['size_id']) ||
            count($validated['sku']) !== count($validated['color_id']) ||
            count($validated['sku']) !== count($validated['amount_in_stock'])) {
            return back()->withErrors(['sku' => 'All SKU fields must be filled with matching lengths.'])->withInput();
        }

        // Update product details
        $product->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'price' => $validated['price'],
            'description' => $validated['description'],
            'brand_id' => $validated['brand_id'],
        ]);

        $product->categories()->sync($validated['categories'] ?? []);

        $product->collections()->sync($validated['collections'] ?? []);

        // Handle image deletions
        if ($request->has('delete_images')) {
            $imagesToDelete = $request->input('delete_images', []);
            foreach ($imagesToDelete as $imageId) {
                $image = ProductImage::findOrFail($imageId);
                Storage::disk('public')->delete($image->path);
                $image->delete();
            }
        }

        // Handle new image uploads
        if ($request->hasFile('product_images')) {
            $currentImageCount = $product->images()->count();
            $newImageCount = count($request->file('product_images'));
            $maxImages = 5;

            if ($currentImageCount + $newImageCount > $maxImages) {
                return back()->withErrors(['product_images' => "Cannot upload more than $maxImages images total."])->withInput();
            }

            foreach ($request->file('product_images') as $index => $image) {
                $path = $image->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $path,
                    'order' => $currentImageCount + $index + 1,
                ]);
            }
        }

        $submittedSkuIds = $validated['sku_id'] ?? [];
        $existingSkus = $product->skus()->pluck('id')->toArray();

        // Update or create SKUs
        foreach ($validated['sku'] as $index => $skuCode) {
            $skuData = [
                'product_id' => $product->id,
                'sku' => $skuCode,
                'amount_in_stock' => $validated['amount_in_stock'][$index],
                'color_id' => $validated['color_id'][$index],
                'size_id' => $validated['size_id'][$index],
            ];

            if (!empty($validated['sku_id'][$index])) {
                // Update existing SKU
                Sku::where('id', $validated['sku_id'][$index])
                    ->where('product_id', $product->id)
                    ->update($skuData);
            } else {
                // Create new SKU
                Sku::create($skuData);
            }
        }

        return redirect()->route('admin.products');
    }

    public function delete_product($id)
    {
        $product = Product::findOrFail($id);

        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        $product->delete();

        return redirect()->route('admin.products');
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
        $category = Category::findOrFail($id);
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
