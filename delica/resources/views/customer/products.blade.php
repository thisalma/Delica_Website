<x-layouts.customer>
    <div class="min-h-screen bg-gray-50 flex flex-col">

        <!-- PAGE HEADER + SEARCH BAR -->
        <div class="max-w-7xl mx-auto px-6 py-6 mt-4 text-center">
            <h1 class="text-4xl font-extrabold text-pink-600 mb-4">Our Products</h1>
            <p class="text-gray-700 mb-6">Browse all products added by our trusted providers</p>

            <!-- BIG SEARCH FORM -->
            <form action="{{ route('customer.products') }}" method="GET" class="flex justify-center">
                <div class="relative w-full md:w-3/4 lg:w-2/3">
                    <input type="text" name="search"
                           value="{{ request('search') }}"
                           placeholder="Search for products or categories..."
                           class="w-full px-6 py-4 text-lg border border-gray-300 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-pink-600"
                    >
                    <button type="submit"
                            class="absolute right-1 top-1/2 transform -translate-y-1/2 bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-3 rounded-full shadow-lg transition duration-300">
                        Search
                    </button>
                </div>
            </form>
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

                        <form action="{{ route('customer.cart.add', $product->id) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit"
                                class="w-full text-center bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 rounded-lg transition duration-300">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-700 col-span-full text-center">No products found.</p>
            @endforelse
        </main>
    </div>
</x-layouts.customer>
