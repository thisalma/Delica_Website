@extends('provider.layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="p-6 bg-pink-50 min-h-screen">
    <h1 class="text-3xl font-bold text-pink-700 mb-6">Order #{{ $order->id }}</h1>

    <div class="bg-white shadow rounded-xl p-6 space-y-3">
        <p><strong>Customer:</strong> {{ $order->user->name ?? 'Guest' }}</p>
        <p><strong>Total:</strong> Rs. {{ number_format($providerTotal, 2) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        <p><strong>Created At:</strong> {{ $order->created_at->format('d M, Y H:i') }}</p>

        <div class="mt-4">
            <h2 class="font-bold text-pink-600 mb-2">Your Products in this Order:</h2>
            <ul class="list-disc pl-6">
                @foreach($order->items as $item)
                    <li>{{ $item->product->name }} (x{{ $item->quantity }})</li>
                @endforeach
            </ul>
        </div>
    </div>

    <a href="{{ route('provider.orders') }}"
       class="inline-block mt-4 px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
       Back to Orders
    </a>
</div>
@endsection
