<?php

namespace App\Http\Controllers;

use App\Traits\CheckoutTrait;
use App\Models\SKU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    use CheckoutTrait;

    public function index()
    {
        $data = $this->getCartData();
        return view('checkout.cart', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'sku_id' => 'required|exists:skus,id',
            'quantity' => 'required|integer'
        ]);

        $sku_id = $request->sku_id;
        $quantity = $request->quantity;
        $cart_key = 'sku_' . $sku_id;

        $sku = SKU::findOrFail($sku_id);
        if ($quantity > $sku->amount_in_stock && $quantity > 0) {
            return redirect()->route('checkout')
                ->with('error', 'This quantity of the product is not available.');
        }

        if (Auth::check()) {
            $cart = \App\Models\Cart::where('user_id', Auth::id())->first();
            if ($cart) {
                $cart_item = $cart->items()->where('sku_id', $sku_id)->first();
                if ($cart_item) {
                    if ($quantity <= 0) {
                        $cart_item->delete();
                    } else {
                        $cart_item->update(['quantity' => $quantity]);
                    }
                } else {
                    return redirect()->route('checkout')
                        ->with('error', 'Item not found in cart.');
                }
            } else {
                return redirect()->route('checkout')
                    ->with('error', 'Cart not found.');
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$cart_key])) {
                if ($quantity <= 0) {
                    unset($cart[$cart_key]);
                } else {
                    $cart[$cart_key]['quantity'] = $quantity;
                }
                session()->put('cart', $cart);
            } else {
                return redirect()->route('checkout')
                    ->with('error', 'Item not found in cart.');
            }
        }

        return redirect()->route('checkout');
    }
}
