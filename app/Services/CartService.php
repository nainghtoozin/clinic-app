<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public static function add(Product $product, $qty = 1)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty'] += $qty;
        } else {
            $cart[$product->id] = [
                'name'  => $product->name,
                'price' => $product->price,
                'qty'   => $qty,
            ];
        }

        session()->put('cart', $cart);
    }

    public static function update($productId, $qty)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['qty'] = max(1, $qty);
            session()->put('cart', $cart);
        }
    }

    public static function remove($productId)
    {
        $cart = session()->get('cart', []);
        unset($cart[$productId]);
        session()->put('cart', $cart);
    }
}
