@extends('provider.layouts.app')
@section('title', 'Manage Products')

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Manage Products</h1>

@if(session('success'))
<div class="bg-green-100 text-green-800 p-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('provider.products.create') }}"
   class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
   + Add Product
</a>

<div class="overflow-x-auto bg-white shadow rounded-xl">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Image</th>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Category</th>
                <th class="px-4 py-2 text-left">Price</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($products as $product)
            <tr>
                <td class="px-4 py-2">
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}"
                             class="w-16 h-16 object-cover rounded">
                    @else
                        <span class="text-gray-500">No Image</span>
                    @endif
                </td>
                <td class="px-4 py-2">{{ $product->name }}</td>
                <td class="px-4 py-2">{{ $product->category }}</td>
                <td class="px-4 py-2">Rs. {{ number_format($product->price, 2) }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('provider.products.edit', $product->id) }}"
                       class="text-blue-600 hover:underline">
                        Edit
                    </a>

                    <form method="POST"
                          action="{{ route('provider.products.destroy', $product->id) }}"
                          class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Delete this product?')"
                                class="text-red-600 hover:underline">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
