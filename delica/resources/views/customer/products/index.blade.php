<x-layouts.customer>
    <div class="min-h-screen bg-gray-10 flex flex-col">

        <!-- PAGE HEADER -->
        <div class="max-w-7xl mx-auto px-6 py-8 text-center">
            <h1 class="text-3xl font-bold text-pink-600 mb-2">Our Products</h1>
           
        </div>

        <!-- PRODUCTS GRID -->
        <main class="max-w-7xl mx-auto px-6 py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            @forelse($products as $product)
                <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:shadow-2xl transition duration-300">
                    <img src="{{ asset('storage/'.$product->image) }}" 
                         class="w-full h-48 object-cover" 
                         alt="{{ $product->name }}">

                    <div class="p-5">
                        <h3 class="text-xl font-bold text-pink-600">{{ $product->name }}</h3>
                        <p class="text-gray-700 mt-2">{{ Str::limit($product->description, 60) }}</p>
                        <p class="text-gray-900 font-semibold mt-2">LKR {{ number_format($product->price, 2) }}</p>

                        <a href="{{ route('customer.cart.add', $product->id) }}"
                           class="mt-4 inline-block w-full text-center bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 rounded-lg transition duration-300">
                            Add to Cart
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-700 col-span-full text-center">No products available yet.</p>
            @endforelse

        </main>
    </div>
</x-layouts.customer>
