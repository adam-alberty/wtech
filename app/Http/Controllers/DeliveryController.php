<?php

namespace App\Http\Controllers;

use App\Traits\CheckoutTrait;
use App\Models\DeliveryType;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    use CheckoutTrait;

    public function index()
    {
        $data = $this->getCartData();
        if (empty($data['cart_items'])) {
            return redirect()->route('checkout')
                ->with('error', 'Your cart is empty. Please add items to proceed.');
        }
        $delivery_types = DeliveryType::all();
        return view('checkout.delivery', array_merge($data, compact('delivery_types')));
    }

    public function save(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'phone_number' => 'required|string|max:20',
            'country' => 'required|string|max:20',
            'city' => 'required|string|max:20',
            'street_address' => 'required|string|max:50',
            'zip_code' => 'required|string|max:10',
            'delivery_type_id' => 'required|exists:delivery_types,id'
        ]);

        $delivery_type = DeliveryType::findOrFail($request->delivery_type_id);

        $delivery_data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'country' => $request->country,
            'city' => $request->city,
            'street_address' => $request->street_address,
            'zip_code' => $request->zip_code,
            'delivery_type_id' => $request->delivery_type_id,
            'delivery_type_name' => $delivery_type->name,
            'delivery_price' => $delivery_type->price
        ];
        session()->put('delivery_data', $delivery_data);

        return redirect()->route('payment');
    }
}
