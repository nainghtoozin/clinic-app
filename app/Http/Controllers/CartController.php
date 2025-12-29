<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Product $product)
    {
        CartService::add($product);
        return response()->json(['success' => true]);
    }

    public function update(Request $request)
    {
        CartService::update($request->product_id, $request->qty);
        return response()->json(['success' => true]);
    }

    public function remove(Request $request)
    {
        CartService::remove($request->product_id);
        return response()->json(['success' => true]);
    }
}
