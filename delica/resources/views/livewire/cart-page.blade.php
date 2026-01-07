<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- ✅ Success message (Add to Cart) --}}
    @if (session()->has('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-3xl font-bold text-pink-600 mb-6">Your Cart</h1>

    @if($items->count())
        <div class="bg-white shadow rounded-lg p-6 space-y-6">

            @foreach($items as $item)
                <div class="flex flex-col md:flex-row items-center justify-between border-b pb-4">

                    <!-- Product Info -->
                    <div class="flex items-center gap-4 w-full md:w-1/2">
                        <img src="{{ asset('storage/' . $item->product->image) }}"
                             alt="{{ $item->product->name }}"
                             class="w-16 h-16 object-cover rounded shadow">

                        <div>
                            <h4 class="font-bold text-lg">
                                {{ $item->product->name }}
                            </h4>
                            <p class="text-gray-500">
                                Price: LKR {{ number_format($item->product->price, 2) }}
                            </p>
                        </div>
                    </div>

                    <!-- Quantity Controls -->
                    <div class="flex items-center gap-2 mt-4 md:mt-0">
                        <button wire:click="decrease({{ $item->id }})"
                                class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">
                            −
                        </button>

                        <span class="font-semibold px-2">
                            {{ $item->quantity }}
                        </span>

                        <button wire:click="increase({{ $item->id }})"
                                class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">
                            +
                        </button>

                        <button wire:click="remove({{ $item->id }})"
                                class="px-2 py-1 bg-red-500 text-white rounded ml-4 hover:bg-red-600">
                            Remove
                        </button>
                    </div>

                    <!-- Item Total -->
                    <div class="mt-4 md:mt-0 font-bold">
                        LKR {{ number_format($item->product->price * $item->quantity, 2) }}
                    </div>
                </div>
            @endforeach

            <!-- Total & Checkout -->
            <div class="flex flex-col md:flex-row justify-between items-center mt-6 border-t pt-6">
                <div class="text-2xl font-bold mb-4 md:mb-0">
                    Total: LKR {{ number_format($total, 2) }}
                </div>

                {{-- Checkout --}}
                <a href="{{ route('customer.checkout') }}"
                   class="px-6 py-3 bg-pink-600 text-white font-bold rounded-lg hover:bg-pink-700 transition">
                    Proceed to Checkout
                </a>
            </div>

        </div>
    @else
        <!-- Empty Cart -->
        <div class="bg-white shadow rounded-lg p-6 text-center">
            <p class="text-gray-700 text-lg">
                Your cart is empty 🛒
            </p>
        </div>
    @endif

</div>
