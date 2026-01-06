<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->query('search'));
        $category = $request->query('category');

        $pageTitle = 'All Products';

        $products = Product::query();

        if ($category) {
            $products->where('category', $category);
            $pageTitle = "Products in: " . $category;
        }

        if (!empty($search)) {
            $products->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('category', 'LIKE', "%{$search}%");
            });

            $pageTitle = "Search results for: " . $search;
        }

        $products = $products->latest()->get();

        return view('customer.products.index', compact(
            'products',
            'search',
            'category',
            'pageTitle'
        ));
    }
}
