<div class="max-w-7xl mx-auto px-6 py-6">

    <h1 class="text-3xl font-bold text-pink-600 mb-6">Your Cart</h1>

    @if($items->count())

        <table class="w-full bg-white shadow rounded-lg overflow-hidden">
            <thead class="bg-pink-100">
                <tr>
                    <th class="px-4 py-3 text-left">Product</th>
                    <th class="px-4 py-3 text-center">Quantity</th>
                    <th class="px-4 py-3 text-center">Price</th>
                    <th class="px-4 py-3 text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($items as $item)
                    <tr class="border-b">

                        <!-- Product -->
                        <td class="px-4 py-3 flex items-center gap-4">
                            <img
                                src="{{ asset('storage/' . $item->product->image) }}"
                                class="w-14 h-14 object-cover rounded"
                                alt="{{ $item->product->name }}"
                            >
                            <span class="font-semibold">
                                {{ $item->product->name }}
                            </span>
                        </td>

                        <!-- Quantity -->
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <button
                                    wire:click="decrease({{ $item->id }})"
                                    class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300"
                                >-</button>

                                <span class="font-semibold">
                                    {{ $item->quantity }}
                                </span>

                                <button
                                    wire:click="increase({{ $item->id }})"
                                    class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300"
                                >+</button>
                            </div>
                        </td>

                        <!-- Price -->
                        <td class="px-4 py-3 text-center font-semibold">
                            LKR {{ number_format($item->product->price * $item->quantity, 2) }}
                        </td>

                        <!-- Remove -->
                        <td class="px-4 py-3 text-center">
                            <button
                                wire:click="remove({{ $item->id }})"
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600"
                            >
                                Remove
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total + Checkout -->
        <div class="mt-6 flex justify-between items-center">

            <div class="text-xl font-bold">
                Total: LKR {{ number_format($total, 2) }}
            </div>

            <a
                href="{{ route('customer.checkout') }}"
                class="px-6 py-3 bg-pink-600 text-white font-bold rounded hover:bg-pink-700 transition"
            >
                Proceed to Checkout
            </a>

        </div>

    @else
        <div class="bg-white shadow rounded-lg p-6 text-center">
            <p class="text-gray-600 text-lg">Your cart is empty 🛒</p>
        </div>
    @endif

</div>
