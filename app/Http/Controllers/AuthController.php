<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $this->syncSessionToDatabase();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // create user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password_hash' => Hash::make($request->password),
        ]);
        // autologin after registration
        Auth::login($user);


        $this->syncSessionToDatabase();

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    protected function syncSessionToDatabase()
    {
        if (!Auth::check()) {
            return;
        }

        $session_cart = session()->get('cart', []);
        if (empty($session_cart)) {
            return;
        }

        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::id()],
            ['guest_token' => null]
        );

        foreach ($session_cart as $item) {
            $cart_item = $cart->items()->where('sku_id', $item['sku_id'])->first();
            if ($cart_item) {
                $cart_item->update(['quantity' => $cart_item->quantity + $item['quantity']]);
            } else {
                $cart->items()->create([
                    'sku_id' => $item['sku_id'],
                    'quantity' => $item['quantity']
                ]);
            }
        }

        session()->forget('cart');
    }


}
