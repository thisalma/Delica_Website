<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch ALL products (no status filter)
        $products = Product::latest()->get();

        return view('customer.products.index', compact('products'));
    }
}

