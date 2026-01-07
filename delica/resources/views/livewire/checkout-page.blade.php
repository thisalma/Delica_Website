<div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8 px-6">

    <!-- LEFT: Order Summary -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">
        <h2 class="text-2xl font-bold text-pink-600 mb-4">Order Summary</h2>

        @foreach($items as $item)
            <div class="flex items-center gap-4 border-b py-4">
                <img src="{{ asset('storage/' . $item->product->image) }}"
                     class="w-20 h-20 rounded object-cover">

                <div class="flex-1">
                    <p class="font-semibold text-lg">{{ $item->product->name }}</p>
                    <p class="text-gray-600">Qty: {{ $item->quantity }}</p>
                </div>

                <p class="font-bold">
                    LKR {{ number_format($item->product->price * $item->quantity, 2) }}
                </p>
            </div>
        @endforeach

        <div class="mt-6 space-y-2 text-lg">
            <div class="flex justify-between">
                <span>Subtotal</span>
                <span>LKR {{ number_format($subtotal, 2) }}</span>
            </div>

            <div class="flex justify-between">
                <span>Delivery</span>
                <span>LKR {{ number_format($deliveryFee, 2) }}</span>
            </div>

            <div class="flex justify-between font-bold text-xl text-pink-700">
                <span>Total</span>
                <span>LKR {{ number_format($subtotal + $deliveryFee, 2) }}</span>
            </div>
        </div>
    </div>

    <!-- RIGHT: Shipping + Payment -->
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-2xl font-bold text-pink-600 mb-4">Shipping Details</h2>

        <input class="w-full p-3 bg-gray-100 rounded mb-3"
               value="{{ auth()->user()->name }}" readonly>

        <input class="w-full p-3 bg-gray-100 rounded mb-3"
               value="{{ auth()->user()->email }}" readonly>

        <input class="w-full p-3 bg-gray-100 rounded mb-3"
               value="{{ auth()->user()->phone }}" readonly>

        <textarea class="w-full p-3 bg-gray-100 rounded mb-6"
                  readonly>{{ auth()->user()->address }}</textarea>

        <h2 class="text-2xl font-bold text-pink-600 mb-3">Payment Method</h2>

        <label class="flex items-center gap-2 mb-3">
            <input type="radio" wire:model="paymentMethod" value="COD">
            Cash on Delivery
        </label>

        <label class="flex items-center gap-2">
            <input type="radio" wire:model="paymentMethod" value="CARD">
            Card Payment
        </label>

        <button
            wire:click="placeOrder"
            class="w-full mt-6 bg-pink-600 text-white py-3 rounded-xl font-bold hover:bg-pink-700 transition">
            Place Order
        </button>
    </div>

</div>
