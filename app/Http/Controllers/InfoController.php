<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function get_order_status(Request $request): View
    {
        $orderNumber = $request->input('order_number');
        $email = $request->input('email');

        $order = [
            'order_number' => $orderNumber,
            'full_name' => 'Name Surname',
            'status' => 'Pending',
        ];
        return view('info.order_status', compact('order'));
    }
    public function news(): View
    {
        return view('info.news');
    }


}
