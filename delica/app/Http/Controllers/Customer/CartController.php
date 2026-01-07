<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Redirect user to cart page
     * (Livewire handles displaying cart data)
     */
    public function index()
    {
        return view('customer.cart'); 
        // This view ONLY contains <livewire:cart-page />
    }

    /**
     * Add a product to the authenticated user's cart
     */
    public function add(Request $request, Product $product)
    {
        $user = $request->user();

        // Get or create cart
        $cart = $user->cart ?? $user->cart()->create();

        // Add product or increment quantity
        $item = $cart->items()->firstOrCreate(
            ['product_id' => $product->id],
            ['quantity' => 0, 'selected' => true]
        );

        $item->increment('quantity');

        // Redirect to cart page
        return redirect()
            ->route('customer.cart')
            ->with('success', $product->name . ' added to cart!');
    }

    /**
     * Remove a product from the cart (non-Livewire fallback)
     */
    public function remove(Request $request, Product $product)
    {
        $cart = $request->user()->cart;

        if (!$cart) {
            return redirect()->route('customer.cart');
        }

        $cart->items()
            ->where('product_id', $product->id)
            ->delete();

        return redirect()
            ->route('customer.cart')
            ->with('success', 'Product removed from cart.');
    }
}
