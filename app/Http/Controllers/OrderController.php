<?php

namespace App\Http\Controllers;

use App\Traits\CheckoutTrait;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SKU;
use App\Models\PaymentType;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    use CheckoutTrait;

    public function save(Request $request)
    {
        $payment_types = PaymentType::pluck('name')->toArray();

        if (!session()->has('delivery_data')) {
            return redirect()->route('delivery')
                ->with('error', 'Please complete the delivery step first.');
        }

        $data = $this->getCartData();
        $cart_items = $data['cart_items'];
        $subtotal = $data['subtotal'];

        if (empty($cart_items)) {
            return redirect()->route('checkout')
                ->with('error', 'Your cart is empty.');
        }

        foreach ($cart_items as $item) {
            if ($item['sku_id']) {
                $sku = SKU::findOrFail($item['sku_id']);
                if ($item['quantity'] > $sku->amount_in_stock) {
                    return redirect()->route('checkout')
                        ->with('error', 'This quantity of the product is not available.');
                }
            }
        }

        return DB::transaction(function () use ($cart_items, $subtotal, $request) {
            $delivery_data = session('delivery_data');
            $total = $subtotal + ($delivery_data['delivery_price'] ?? 0);

            $payment_type = PaymentType::where('name', $request->payment_method)->firstOrFail();

            $order = Order::create([
                'user_id' => Auth::check() ? Auth::id() : null,
                'delivery_type_id' => $delivery_data['delivery_type_id'],
                'payment_type_id' => $payment_type->id,
                'price' => $total,
                'full_name' => $delivery_data['full_name'],
                'email' => $delivery_data['email'],
                'phone_number' => $delivery_data['phone_number'],
                'country' => $delivery_data['country'],
                'city' => $delivery_data['city'],
                'street_address' => $delivery_data['street_address'],
                'zip_code' => $delivery_data['zip_code'],
                'status' => 'placed'
            ]);

            foreach ($cart_items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'sku_id' => $item['sku_id'],
                    'name' => $item['product_name'],
                    'unit_price' => $item['unit_price'],
                    'quantity' => $item['quantity']
                ]);
                if ($item['sku_id']) {
                    SKU::findOrFail($item['sku_id'])->decrement('amount_in_stock', $item['quantity']);
                }
            }

            if (Auth::check()) {
                $cart = Cart::where('user_id', Auth::id())->first();
                if ($cart) {
                    $cart->items()->delete();
                    $cart->delete();
                }
            }
            session()->forget(['cart', 'delivery_data']);

            return redirect()->route('order.success', ['order' => $order->id]);
        });
    }

    public function success(Order $order)
    {
        return view('checkout.order', compact('order'));
    }
}
