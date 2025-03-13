<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function about(): View
    {
        return view('info.about');
    }

    public function news(): View
    {
        return view('info.news');
    }

    public function career(): View
    {
        return view('info.career');
    }

    public function returns(): View
    {
        return view('info.returns');
    }

    public function shipping_and_delivery(): View
    {
        return view('info.shipping_and_delivery');
    }

    public function contact(): View
    {
        return view('info.contact');
    }

    public function privacy_policy(): View
    {
        return view('info.privacy_policy');
    }

    public function terms_of_use(): View
    {
        return view('info.terms_of_use');
    }

}
