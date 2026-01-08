<div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8 px-6 py-10">

    <!-- LEFT: Order Summary -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">
        <h2 class="text-2xl font-bold text-pink-600 mb-4">Order Summary</h2>

        @forelse($items as $item)
            <div class="flex items-center gap-4 border-b py-4">
                <img src="{{ asset('storage/' . $item->product->image) }}" class="w-20 h-20 rounded object-cover">
                <div class="flex-1">
                    <p class="font-semibold text-lg">{{ $item->product->name }}</p>
                    <p class="text-gray-600">Qty: {{ $item->quantity }}</p>
                </div>
                <p class="font-bold">LKR {{ number_format($item->product->price * $item->quantity, 2) }}</p>
            </div>
        @empty
            <p class="text-gray-600 py-4">Your cart is empty.</p>
        @endforelse

        <div class="mt-6 space-y-2 text-lg">
            <div class="flex justify-between">
                <span>Subtotal</span>
                <span>LKR {{ number_format($subtotal, 2) }}</span>
            </div>

            @if($paymentMethod === 'COD')
                <div class="flex justify-between">
                    <span>Delivery Fee</span>
                    <span>LKR {{ number_format($deliveryFee, 2) }}</span>
                </div>
            @endif

            <div class="flex justify-between font-bold text-xl text-pink-700 border-t pt-3">
                <span>Total</span>
                <span>LKR {{ number_format($total, 2) }}</span>
            </div>
        </div>
    </div>

    <!-- RIGHT: Shipping + Payment -->
    <div class="bg-white rounded-xl shadow p-6 h-max">
        <h2 class="text-2xl font-bold text-pink-600 mb-4">Shipping Details</h2>

        <input class="w-full p-3 bg-gray-100 rounded mb-3" value="{{ auth()->user()->name }}" readonly>
        <input class="w-full p-3 bg-gray-100 rounded mb-3" value="{{ auth()->user()->email }}" readonly>
        <input class="w-full p-3 bg-gray-100 rounded mb-3" value="{{ auth()->user()->phone }}" readonly>
        <textarea class="w-full p-3 bg-gray-100 rounded mb-6" readonly>{{ auth()->user()->address }}</textarea>

        <h2 class="text-2xl font-bold text-pink-600 mb-3">Payment Method</h2>

        <label class="flex items-center gap-2 mb-3 cursor-pointer">
            <input type="radio" wire:model.live="paymentMethod" value="COD">
            💵 Cash on Delivery
        </label>

        <label class="flex items-center gap-2 mb-4 cursor-pointer">
            <input type="radio" wire:model.live="paymentMethod" value="CARD">
            💳 Card Payment
        </label>

        @if($paymentMethod === 'COD')
            <div class="bg-yellow-50 border border-yellow-300 p-4 rounded mb-4">
                <p class="text-yellow-700 font-semibold">Delivery Fee: LKR {{ number_format($deliveryFee, 2) }}</p>
                <p class="text-sm text-yellow-600">Pay with cash when your order arrives.</p>
            </div>
        @endif

        @if($paymentMethod === 'CARD')
            <div class="space-y-3 mb-4">
                <input type="text" placeholder="Card Holder Name" class="w-full p-3 border rounded">
                <input type="text" placeholder="Card Number" maxlength="16" class="w-full p-3 border rounded">
                <div class="flex gap-3">
                    <input type="text" placeholder="MM/YY" class="w-1/2 p-3 border rounded">
                    <input type="password" placeholder="CVV" maxlength="3" class="w-1/2 p-3 border rounded">
                </div>
                <p class="text-sm text-gray-500">Secure card payment 🔒</p>
            </div>
        @endif

        <button wire:click="placeOrder" 
                wire:loading.attr="disabled"
                class="w-full mt-6 bg-pink-600 text-white py-3 rounded-xl font-bold
                       hover:bg-pink-700 transition disabled:opacity-50">
            <span wire:loading>Placing your order...</span>
            <span wire:loading.remove>Place Order</span>
        </button>
    </div>

    <!-- SUCCESS TOAST -->
<div 
    x-data="{ show: false, message: '' }" 
    x-on:order-placed.window="message = $event.detail.message; show = true; setTimeout(() => show = false, 4000)"
    x-show="show"
    class="fixed top-5 right-5 bg-green-500 text-white px-6 py-3 rounded shadow-lg transition"
    x-transition>
    <span x-text="message"></span>
</div>

<!-- ERROR TOAST -->
<div 
    x-data="{ show: false, message: '' }" 
    x-on:order-error.window="message = $event.detail.message; show = true; setTimeout(() => show = false, 4000)"
    x-show="show"
    class="fixed top-5 right-5 bg-red-500 text-white px-6 py-3 rounded shadow-lg transition"
    x-transition>
    <span x-text="message"></span>
</div>

</div>
