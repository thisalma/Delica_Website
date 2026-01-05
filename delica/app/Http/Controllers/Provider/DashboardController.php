<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if(!$user->is_approved) {
            return view('provider.pending');
        }

        // Total products
        $totalProducts = Product::where('created_by', $user->id)->count();

        // Total orders
        $totalOrders = OrderItem::join('products', 'order_items.product_id', '=', 'products.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('products.created_by', $user->id)
            ->count();

        // Monthly sales (last 6 months)
        $months = [];
        $sales = [];

        for($i = 5; $i >= 0; $i--){
            $month = Carbon::now()->subMonths($i)->format('Y-m');
            $months[] = Carbon::parse($month.'-01')->format('M Y');

            $total = OrderItem::join('products', 'order_items.product_id', '=', 'products.id')
                ->join('orders', 'order_items.order_id', '=', 'orders.id')
                ->where('products.created_by', $user->id)
                ->whereMonth('orders.order_date', Carbon::parse($month.'-01')->month)
                ->whereYear('orders.order_date', Carbon::parse($month.'-01')->year)
                ->selectRaw('SUM(order_items.quantity * products.price) as total_sales')
                ->value('total_sales') ?? 0;

            $sales[] = round($total, 2);
        }

        return view('provider.dashboard', compact(
            'totalProducts', 'totalOrders', 'months', 'sales'
        ));
    }
}
