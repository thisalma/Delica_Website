<x-app-layout>
    <!-- TOP BAR -->
    <x-slot name="header">
        <div class="flex justify-between items-center bg-pink-500 px-6 py-4 rounded-lg">
            
            <!-- Welcome Text -->
            <h2 class="text-xl font-bold text-white">
                Welcome, {{ Auth::user()->name }} 💖
            </h2>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="bg-white text-pink-600 font-semibold px-4 py-2 rounded-lg hover:bg-pink-100 transition"
                >
                    Logout
                </button>
            </form>

        </div>
    </x-slot>

    <!-- PAGE CONTENT -->
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white p-8 rounded-2xl shadow-md">
                <h3 class="text-2xl font-bold text-pink-600 mb-4">
                    Customer Dashboard
                </h3>

                <p class="text-gray-600">
                    You are successfully logged in as a customer.
                </p>

                <!-- You can add cards / orders / profile later -->
            </div>

        </div>
    </div>
</x-app-layout>
