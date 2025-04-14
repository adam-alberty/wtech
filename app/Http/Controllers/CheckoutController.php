<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\SKU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = [];
        $total = 0;

        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->with(['items' => function ($query) {
                $query->orderBy('created_at', 'asc');
            }, 'items.sku.product', 'items.sku.color', 'items.sku.size'])->first();
            if ($cart) {
                $cartItems = $cart->items->map(function ($item) {
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
            $cartItems = collect($cart)->map(function ($item, $key) {
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

        $total = array_sum(array_map(function ($item) {
            return $item['unit_price'] * $item['quantity'];
        }, $cartItems));

        if (request()->has('step')) {
            $step = request()->query('step');
            switch ($step) {
                case "1":
                    return view('checkout.cart', compact('cartItems', 'total'));
                case "2":
                    return view('checkout.delivery', compact('cartItems', 'total'));
                case "3":
                    return view('checkout.payment', compact('cartItems', 'total'));
                default:
                    return redirect()->to(request()->url());
            }
        } else {
            return view('checkout.cart', compact('cartItems', 'total'));
        }
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'sku_id' => 'required|exists:skus,id',
            'quantity' => 'required|integer'
        ]);

        $skuId = $request->sku_id;
        $quantity = $request->quantity;
        $cartKey = 'sku_' . $skuId;

        $sku = Sku::findOrFail($skuId);
        if ($quantity > $sku->amount_in_stock && $quantity > 0) {
            return redirect()->route('checkout')->with('error', 'This quantity of the product is not available.');
        }

        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if ($cart) {
                $cartItem = $cart->items()->where('sku_id', $skuId)->first();
                if ($cartItem) {
                    if ($quantity <= 0) {
                        $cartItem->delete();
                    } else {
                        $cartItem->update(['quantity' => $quantity]);
                    }
                } else {
                    return redirect()->route('checkout')->with('error', 'Item not found in cart.');
                }
            } else {
                return redirect()->route('checkout')->with('error', 'Cart not found.');
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$cartKey])) {
                if ($quantity <= 0) {
                    unset($cart[$cartKey]);
                } else {
                    $cart[$cartKey]['quantity'] = $quantity;
                }
                session()->put('cart', $cart);
            } else {
                return redirect()->route('checkout')->with('error', 'Item not found in cart.');
            }
        }

        return redirect()->route('checkout');
    }
}
