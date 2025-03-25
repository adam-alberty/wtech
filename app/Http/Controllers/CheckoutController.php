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
                    return view('cart');
                case "2":
                    return view('delivery');
                case "3":
                    return view('payment');
                default:
                    return redirect()->to(request()->url());
            };
        } else {
            return view('cart');
        }
    }
}
