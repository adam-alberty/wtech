<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {

        if (request()->has('step')) {
            $step = request()->query('step');
            switch ($step) {
                case "1":
                    return view('checkout.cart');
                case "2":
                    return view('checkout.delivery');
                case "3":
                    return view('checkout.payment');
                default:
                    return redirect()->to(request()->url());
            };
        } else {
            return view('checkout.cart');
        }
    }
}
