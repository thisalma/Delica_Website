@extends('provider.layouts.app')
@section('title', 'Add Product')

@section('content')
<h1 class="text-3xl font-bold mb-6">Add Product</h1>

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data"
      class="bg-white p-6 rounded shadow max-w-lg">
    @csrf
    <label class="block mb-2">Product Name</label>
    <input type="text" name="name" value="{{ old('name') }}"
           class="w-full p-2 border rounded mb-4" required>

    <label class="block mb-2">Category</label>
    <input type="text" name="category" value="{{ old('category') }}"
           class="w-full p-2 border rounded mb-4" required>

    <label class="block mb-2">Description</label>
    <textarea name="description" class="w-full p-2 border rounded mb-4">{{ old('description') }}</textarea>

    <label class="block mb-2">Price</label>
    <input type="number" step="0.01" name="price" value="{{ old('price') }}"
           class="w-full p-2 border rounded mb-4" required>

    <label class="block mb-2">Product Image</label>
    <input type="file" name="image" accept="image/*" class="w-full p-2 border rounded mb-4">

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Product</button>
</form>
@endsection
