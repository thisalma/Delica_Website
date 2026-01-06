<x-layouts.customer>
    <div class="bg-gray-100 min-h-screen py-10">

        <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg p-6 grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- PRODUCT IMAGE -->
            <div>
                <img src="{{ asset('storage/'.$product->image) }}"
                     class="w-full h-96 object-cover rounded-lg">
            </div>

            <!-- PRODUCT INFO -->
            <div>
                <h1 class="text-3xl font-bold text-pink-600 mb-4">
                    {{ $product->name }}
                </h1>

                <p class="text-gray-700 mb-4">
                    {{ $product->description }}
                </p>

                <p class="text-xl font-bold text-gray-900 mb-4">
                    LKR {{ number_format($product->price, 2) }}
                </p>

                <p class="text-sm text-gray-500 mb-6">
                    Category: <span class="font-semibold">{{ $product->category }}</span>
                </p>

                <!-- ADD TO CART -->
                <form method="POST" action="{{ route('customer.cart.add', $product->id) }}">
                    @csrf
                    <button
                        class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 rounded-lg transition">
                        Add to Cart
                    </button>
                </form>

                <!-- BACK -->
                <a href="{{ route('customer.products') }}"
                   class="inline-block mt-4 text-sm text-pink-600 hover:underline">
                    ← Back to Products
                </a>
            </div>

        </div>
    </div>
</x-layouts.customer>
