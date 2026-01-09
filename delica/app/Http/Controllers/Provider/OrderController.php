<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $providerId = Auth::id();

        // Orders containing at least one product of this provider
        $orders = Order::whereHas('items.product', function($query) use ($providerId) {
            $query->where('created_by', $providerId);
        })
        ->with(['items.product', 'user'])
        ->orderBy('created_at', 'desc')
        ->get();

        // Add provider-specific total to each order
        $orders->each(function($order) use ($providerId) {
            $order->providerTotal = $order->items
                ->filter(fn($item) => $item->product->created_by == $providerId)
                ->sum(fn($item) => $item->price * $item->quantity);
        });

        return view('provider.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $providerId = Auth::id();

        // Find the order that contains at least one product of this provider
        $order = Order::with(['items.product', 'user'])
            ->whereHas('items.product', function($query) use ($providerId) {
                $query->where('created_by', $providerId);
            })
            ->findOrFail($id);

        // Filter items to only include the provider's products
        $order->items = $order->items->filter(fn($item) => $item->product->created_by == $providerId);

        // Calculate total for this provider's items only
        $providerTotal = $order->items->sum(fn($item) => $item->price * $item->quantity);

        return view('provider.orders.show', compact('order', 'providerTotal'));
    }
}
