<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('created_by', Auth::id())->get();
        return view('provider.products.index', compact('products'));
    }

    public function create()
    {
        return view('provider.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('products', 'public') : null;

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('provider.products.index')
                         ->with('success', 'Product added successfully!');
    }

    public function edit(Product $product)
    {
        // Simple ownership check instead of authorize()
        if ($product->created_by != Auth::id()) {
            abort(403, 'You do not own this product.');
        }

        return view('provider.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        //  Simple ownership check instead of authorize()
        if ($product->created_by != Auth::id()) {
            abort(403, 'You do not own this product.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) Storage::disk('public')->delete($product->image);
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('provider.products.index')
                         ->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Simple ownership check instead of authorize()
        if ($product->created_by != Auth::id()) {
            abort(403, 'You do not own this product.');
        }

        if ($product->image) Storage::disk('public')->delete($product->image);
        $product->delete();

        return redirect()->route('provider.products.index')
                         ->with('success', 'Product deleted successfully!');
    }
}
