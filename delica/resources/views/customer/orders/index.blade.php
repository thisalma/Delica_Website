<x-layouts.customer>
    <div class="min-h-screen bg-gray-50 px-6 py-10 max-w-7xl mx-auto">

        <h1 class="text-3xl font-extrabold text-pink-600 mb-8">
            Order History
        </h1>

        @if($orders->isEmpty())
            <div class="bg-white p-6 rounded-xl shadow text-gray-600">
                You have not placed any orders yet.
            </div>
        @else
            <div class="space-y-8">
                @foreach($orders as $order)
                    <div class="bg-white rounded-xl shadow-lg p-6">

                        <!-- ORDER HEADER -->
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h2 class="text-xl font-bold text-pink-600">
                                    Order #{{ $order->id }}
                                </h2>
                                <p class="text-gray-500 text-sm">
                                    Ordered on {{ $order->order_date->format('d M Y, h:i A') }}
                                </p>
                            </div>

                            <span class="px-4 py-1 rounded-full text-sm
                                {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>

                        <!-- PRODUCTS -->
                        <div class="border-t pt-4 space-y-4">
                            @foreach($order->items as $item)
                                <div class="flex justify-between items-center">
                                    <div class="flex gap-4 items-center">
                                        <img
                                            src="{{ asset('storage/' . $item->product->image) }}"
                                            class="w-20 h-20 object-cover rounded-lg"
                                            alt="{{ $item->product->name }}"
                                        >

                                        <div>
                                            <p class="font-semibold">
                                                {{ $item->product->name }}
                                            </p>
                                            <p class="text-gray-500 text-sm">
                                                Quantity: {{ $item->quantity }}
                                            </p>
                                        </div>
                                    </div>

                                    <p class="font-bold">
                                        LKR {{ number_format($item->price * $item->quantity, 2) }}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                        <!-- ORDER FOOTER -->
                        <div class="flex justify-between items-center border-t pt-4 mt-4">
                            <div class="text-sm text-gray-600">
                                Payment Method: {{ $order->payment_method }}
                            </div>
                            <div class="text-lg font-extrabold text-pink-600">
                                Total: LKR {{ number_format($order->total_amount, 2) }}
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </div>
</x-layouts.customer>
