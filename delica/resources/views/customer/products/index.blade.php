<x-layouts.customer>
    <div class="bg-gray-100 min-h-screen">

        <!-- SEARCH BAR -->
        <div class="bg-white px-4 py-4 shadow">
            <form method="GET" action="{{ route('customer.products') }}"
                  class="flex max-w-3xl mx-auto">

                @if($category)
                    <input type="hidden" name="category" value="{{ $category }}">
                @endif

                <input type="text"
                       name="search"
                       value="{{ $search }}"
                       placeholder="Search products..."
                       class="flex-1 px-4 py-3 border border-gray-300 rounded-l
                              focus:ring-2 focus:ring-pink-500 focus:outline-none">

                <button
                    class="bg-pink-600 hover:bg-pink-700 text-white px-6 rounded-r font-semibold">
                    Search
                </button>
            </form>
        </div>

        <!-- CONTENT -->
        <div class="max-w-7xl mx-auto px-6 py-6">

            <h1 class="text-xl font-bold text-pink-600 mb-2">
                {{ $pageTitle }}
            </h1>

            @if($search || $category)
                <a href="{{ route('customer.products') }}"
                   class="inline-block mb-4 text-sm text-pink-600 font-semibold hover:underline">
                    ← Back to All Products
                </a>
            @endif

            <!-- PRODUCTS GRID -->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                @forelse($products as $product)
                    <div class="bg-white rounded shadow hover:shadow-lg transition p-3">

                        <a href="{{ route('customer.products.show', $product->id) }}">
    <img src="{{ asset('storage/'.$product->image) }}"
         class="w-full h-32 sm:h-40 object-cover rounded mb-2">
</a>

<h2 class="text-sm font-semibold truncate">
    <a href="{{ route('customer.products.show', $product->id) }}"
       class="hover:text-pink-600">
        {{ $product->name }}
    </a>
</h2>

                        <p class="text-pink-600 font-bold text-sm">
                            LKR {{ number_format($product->price, 2) }}
                        </p>

                        <form method="POST"
                              action="{{ route('customer.cart.add', $product->id) }}">
                            @csrf
                            <button
                                class="mt-2 w-full bg-pink-600 hover:bg-pink-700 text-white py-1 rounded text-sm">
                                Add to Cart
                            </button>
                        </form>

                    </div>
                @empty
                    <p class="text-gray-600 col-span-full">
                        No products found.
                    </p>
                @endforelse

            </div>
        </div>
    </div>
</x-layouts.customer>
