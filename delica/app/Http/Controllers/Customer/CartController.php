<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    /**
     * Add product to cart
     */
    public function add(Product $product): RedirectResponse
    {
        $user = auth()->user();

        // Get or create cart
        $cart = $user->cart ?? $user->cart()->create();

        // Check if product already in cart
        $item = $cart->items()
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity'   => 1,
            ]);
        }

        return back()->with('success', 'Added to cart');
    }
}
