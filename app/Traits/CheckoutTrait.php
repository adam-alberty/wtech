<?php

namespace App\Traits;

use App\Models\Cart;
use App\Models\DeliveryType;
use Illuminate\Support\Facades\Auth;

trait CheckoutTrait
{
    protected function getCartData()
    {
        $cart_items = [];
        $subtotal = 0;
        $delivery_price = 0;

        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->with(['items' => function ($query) {
                $query->orderBy('created_at', 'asc');
            }, 'items.sku.product', 'items.sku.color', 'items.sku.size'])->first();
            if ($cart) {
                $cart_items = $cart->items->map(function ($item) {
                    return [
                        'sku_id' => $item->sku_id,
                        'product_name' => $item->sku->product->name,
                        'image' => $item->sku->product->images->first()->path ?? '/assets/default-image.png',
                        'color_id' => $item->sku->color_id,
                        'color_name' => $item->sku->color->name,
                        'size_id' => $item->sku->size_id,
                        'size_name' => $item->sku->size->name,
                        'unit_price' => $item->sku->product->price,
                        'quantity' => $item->quantity,
                        'added_at' => $item->created_at->toDateTimeString()
                    ];
                })->toArray();
            }
        } else {
            $cart = session()->get('cart', []);
            $cart_items = collect($cart)->map(function ($item, $key) {
                return [
                    'sku_id' => $item['sku_id'],
                    'product_name' => $item['product_name'],
                    'image' => $item['image'],
                    'color_id' => $item['color_id'],
                    'color_name' => $item['color_name'],
                    'size_id' => $item['size_id'],
                    'size_name' => $item['size_name'],
                    'unit_price' => $item['unit_price'],
                    'quantity' => $item['quantity'],
                    'added_at' => $item['added_at']
                ];
            })->sortBy('added_at')->values()->toArray();
        }

        $subtotal = array_sum(array_map(function ($item) {
            return ($item['unit_price'] ?? 0) * ($item['quantity'] ?? 0);
        }, $cart_items));

        $delivery_data = session('delivery_data', []);
        if (isset($delivery_data['delivery_type_id'])) {
            $delivery_price = DeliveryType::find($delivery_data['delivery_type_id'])->price ?? 0;
        }

        $total = $subtotal + $delivery_price;

        return compact('cart_items', 'subtotal', 'delivery_price', 'total', 'delivery_data');
    }
}
