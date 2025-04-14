<?php

namespace App\Http\Controllers;

use App\Traits\CheckoutTrait;

class PaymentController extends Controller
{
    use CheckoutTrait;

    public function index()
    {
        if (!session()->has('delivery_data')) {
            return redirect()->route('delivery')
                ->with('error', 'Please complete the delivery step first.');
        }

        $data = $this->getCartData();
        return view('checkout.payment', $data);
    }
}
