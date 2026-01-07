<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display all items in the authenticated user's cart
     */
    public function index(Request $request)
    {
        $user = $request->user();

        // Get or create cart
        $cart = $user->cart ?? $user->cart()->create();

        // Load items with product details
        $items = $cart->items()->with('product')->get();

        // Calculate total
        $total = $items->sum(fn($i) => $i->product->price * $i->quantity);

        return response()->json([
            'items' => $items,
            'total' => $total,
        ]);
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
            ['quantity' => 0]
        );
        $item->increment('quantity');

        return response()->json(['message' => 'Product added to cart', 'item' => $item]);
    }

    /**
     * Remove a product from the authenticated user's cart
     */
    public function remove(Request $request, Product $product)
    {
        $user = $request->user();
        $cart = $user->cart;

        if (!$cart) {
            return response()->json(['message' => 'Cart is empty'], 400);
        }

        $item = $cart->items()->where('product_id', $product->id)->first();

        if ($item) {
            $item->delete();
            return response()->json(['message' => 'Product removed from cart']);
        }

        return response()->json(['message' => 'Product not in cart'], 404);
    }
}
