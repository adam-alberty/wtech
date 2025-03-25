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
                    return view('cart', ['step' => 1]);
                case "2":
                    return view('delivery', ['step' => 2]);
                case "3":
                    return view('payment', ['step' => 3]);
                default:
                    return view('cart', ['step' => 1]);
            };
        } else {
            return view('cart', ['step' => 1]);
        }
    }
}
