<div class="max-w-7xl mx-auto px-6">
    <h1 class="text-3xl font-bold text-pink-600 mb-6">Your Cart</h1>

    @if($items->count())
        <table class="w-full bg-white shadow rounded-lg overflow-hidden">
            <thead class="bg-pink-100">
                <tr>
                    <th class="px-4 py-2 text-left">Product</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $item->product->name }}</td>
                        <td class="px-4 py-2 flex items-center justify-center space-x-2">
                            <button wire:click="decrease({{ $item->id }})"
                                    class="px-2 py-1 bg-gray-200 rounded">-</button>
                            <span>{{ $item->quantity }}</span>
                            <button wire:click="increase({{ $item->id }})"
                                    class="px-2 py-1 bg-gray-200 rounded">+</button>
                        </td>
                        <td class="px-4 py-2">
                            LKR {{ number_format($item->product->price * $item->quantity, 2) }}
                        </td>
                        <td class="px-4 py-2">
                            <button wire:click="remove({{ $item->id }})"
                                    class="px-3 py-1 bg-red-500 text-white rounded">
                                Remove
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 text-right font-bold text-lg">
            Total: LKR {{ number_format($total, 2) }}
        </div>
    @else
        <p class="text-gray-700">Your cart is empty.</p>
    @endif
</div>
