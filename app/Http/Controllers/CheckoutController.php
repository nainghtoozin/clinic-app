<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $user = Auth::user(); // 🔥 logged-in user

        return view('checkout.index', compact('cart', 'user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // ❌ No need to validate name/email (already trusted)
        // Later: save order using $user data

        session()->forget('cart');

        return redirect('/')
            ->with('success', 'Order placed successfully!');
    }
}
