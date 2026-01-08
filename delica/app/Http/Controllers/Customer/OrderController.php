<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $orders = Order::with(['items.product'])
            ->where('user_id', $user->id)
            ->orderBy('order_date', 'desc')
            ->get();

        return view('customer.orders.index', compact('orders'));
    }
}
