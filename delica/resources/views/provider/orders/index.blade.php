@extends('provider.layouts.app')

@section('title', 'Orders')

@section('content')
<div class="p-6 bg-pink-50 min-h-screen">
    <h1 class="text-3xl font-bold text-pink-700 mb-6">Orders</h1>

    <div class="overflow-x-auto bg-white shadow rounded-xl">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-pink-100">
                <tr>
                    <th class="px-4 py-2 text-left">Order ID</th>
                    <th class="px-4 py-2 text-left">Total</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Products</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($orders as $order)
                <tr>
                    <td class="px-4 py-2">{{ $order->id }}</td>

                    {{-- Provider-specific total --}}
                    <td class="px-4 py-2">
                        Rs. {{ number_format($order->providerTotal, 2) }}
                    </td>

                    <td class="px-4 py-2">{{ ucfirst($order->status) }}</td>

                    {{-- List provider's product names --}}
                    <td class="px-4 py-2">
                        @foreach($order->items as $item)
                            {{ $item->product->name }} (x{{ $item->quantity }})@if(!$loop->last), @endif
                        @endforeach
                    </td>

                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('provider.orders.show', $order->id) }}"
                           class="text-pink-600 hover:underline">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-2 text-center text-gray-500">
                        No orders found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
