<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\SKU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function single($slug)
    {
        $product = Product::with([
            'images' => function ($query) {
                $query->orderBy('order', 'asc');
            },
            'categories',
            'skus.color',
            'skus.size'
        ])->where('slug', $slug)->firstOrFail();

        $productData = [
            'id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'image' => $product->images->first() ? Storage::url($product->images->first()->path) : '/assets/images/default-image.png',
            'images' => $product->images->map(function ($image) {
                return Storage::url($image->path);
            })->toArray(),
            'link' => "/product/{$product->slug}",
            'price' => $product->price,
            'category' => $product->categories->first()->name ?? 'Uncategorized',
            'htmlDescription' => Str::markdown($product->description ?? ''),
            'colors' => $product->skus->pluck('color')->unique('id')->map(function ($color) {
                return [
                    'id' => $color->id,
                    'name' => $color->name,
                    'code' => $color->color_code
                ];
            })->toArray(),
            'sizes' => $product->skus->pluck('size')->unique('id')->map(function ($size) {
                return [
                    'id' => $size->id,
                    'name' => $size->name
                ];
            })->toArray(),
            'skus' => $product->skus->map(function ($sku) {
                return [
                    'color_id' => $sku->color_id,
                    'size_id' => $sku->size_id,
                    'amount_in_stock' => $sku->amount_in_stock
                ];
            })->toArray()
        ];

        return view('product')->with('product', $productData);
    }

    public function addToCart(Request $request, $slug)
    {
        $request->validate([
            'color_id' => 'required|exists:colors,id',
            'size_id' => 'required|exists:sizes,id',
            'quantity' => 'required|integer|min:1'
        ], [
            'color_id.required' => 'Please select a color.',
            'color_id.exists' => 'Selected color is invalid.',
            'size_id.required' => 'Please select a size.',
            'size_id.exists' => 'Selected size is invalid.',
            'quantity.required' => 'Please enter a quantity.',
            'quantity.integer' => 'Quantity must be a number.',
            'quantity.min' => 'Quantity must be at least 1.'
        ]);

        $sku = Sku::where('product_id', Product::where('slug', $slug)->firstOrFail()->id)
            ->where('color_id', $request->color_id)
            ->where('size_id', $request->size_id)
            ->with(['product', 'color', 'size'])
            ->first();

        if (!$sku) {
            return redirect()->back()->with('error', 'Selected color and size combination is not available.');
        }

        // Check available quantity
        $current_quantity = 0;
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if ($cart) {
                $cart_item = $cart->items()->where('sku_id', $sku->id)->first();
                $current_quantity = $cart_item ? $cart_item->quantity : 0;
            }
        } else {
            $cart = session()->get('cart', []);
            $cartKey = 'sku_' . $sku->id;
            $current_quantity = isset($cart[$cartKey]) ? $cart[$cartKey]['quantity'] : 0;
        }

        $total_quantity = $current_quantity + $request->quantity;
        if ($total_quantity > $sku->amount_in_stock) {
            return redirect()->back()->with('error', 'This quantity of the product is not available.');
        }

        if (Auth::check()) {
            $cart = Cart::firstOrCreate(
                ['user_id' => Auth::id()],
                ['guest_token' => null]
            );

            $cart_item = $cart->items()->where('sku_id', $sku->id)->first();
            if ($cart_item) {
                $cart_item->update(['quantity' => $total_quantity]);
            } else {
                $cart->items()->create([
                    'sku_id' => $sku->id,
                    'quantity' => $request->quantity
                ]);
            }
        } else {
            $cart = session()->get('cart', []);
            $cartKey = 'sku_' . $sku->id;
            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['quantity'] = $total_quantity;
            } else {
                $cart[$cartKey] = [
                    'sku_id' => $sku->id,
                    'product_name' => $sku->product->name,
                    'image' => $sku->product->images->first() ? Storage::url($sku->product->images->first()->path) : '/assets/images/default-image.png',
                    'color_id' => $sku->color_id,
                    'color_name' => $sku->color->name,
                    'size_id' => $sku->size_id,
                    'size_name' => $sku->size->name,
                    'unit_price' => $sku->product->price,
                    'quantity' => $request->quantity,
                    'added_at' => now()->toDateTimeString()
                ];
            }
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }
}
