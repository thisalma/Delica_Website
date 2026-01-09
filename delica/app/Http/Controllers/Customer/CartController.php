<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    // --- Existing methods remain unchanged ---
    public function index()
    {
        return view('customer.cart'); 
    }

    public function add(Request $request, Product $product)
    {
        $user = $request->user();

        $cart = $user->cart ?? $user->cart()->create();

        $item = $cart->items()->firstOrCreate(
            ['product_id' => $product->id],
            ['quantity' => 0, 'selected' => true]
        );

        $item->increment('quantity');

        return redirect()
            ->route('customer.cart')
            ->with('success', $product->name . ' added to cart!');
    }

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

    // --- NEW API METHODS (for Postman / API testing) ---
    
    public function apiIndex(Request $request)
    {
        $cart = $request->user()->cart ?? $request->user()->cart()->create();
        $items = $cart->items()->with('product')->get();

        $total = $items->sum(fn ($item) => $item->product->price * $item->quantity);

        return response()->json([
            'items' => $items,
            'total' => $total,
        ]);
    }

    public function apiAdd(Request $request, Product $product)
    {
        $user = $request->user();
        $cart = $user->cart ?? $user->cart()->create();

        $item = $cart->items()->firstOrCreate(
            ['product_id' => $product->id],
            ['quantity' => 0, 'selected' => true]
        );

        $item->increment('quantity');

        return response()->json([
            'message' => $product->name . ' added to cart!',
            'cart_item' => $item->load('product'),
        ]);
    }

    public function apiRemove(Request $request, Product $product)
    {
        $cart = $request->user()->cart;

        if (!$cart) {
            return response()->json(['message' => 'Cart is empty'], 404);
        }

        $item = $cart->items()->where('product_id', $product->id)->first();

        if ($item) {
            $item->delete();
        }

        return response()->json(['message' => 'Product removed from cart.']);
    }
}
