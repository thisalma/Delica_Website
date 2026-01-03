<x-app-layout>

    <!-- CUSTOM PINK NAVBAR -->
    <x-slot name="header">
        <nav class="bg-pink-600 text-white px-6 py-4 shadow-md">
            <div class="max-w-7xl mx-auto flex justify-between items-center">

                <!-- LEFT: LOGO + TITLE -->
                <div class="flex items-center space-x-3">
                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Delica Logo"
                        class="h-9 w-9 rounded-full object-cover"
                    >
                    <span class="text-xl font-bold tracking-wide">
                        Customer Dashboard
                    </span>
                </div>

                <!-- CENTER: NAVIGATION -->
                <div class="hidden md:flex space-x-6 font-medium">
                    <a href="{{ route('customer.dashboard') }}"
                       class="hover:text-pink-200">
                        Home
                    </a>
                    <a href="#"
                       class="hover:text-pink-200">
                        Products
                    </a>
                    <a href="#"
                       class="hover:text-pink-200">
                        Orders
                    </a>
                    <a href="#"
                       class="hover:text-pink-200">
                        Profile
                    </a>
                </div>

                <!-- RIGHT: LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="bg-white text-pink-600 px-4 py-2 rounded-lg font-semibold hover:bg-pink-100 transition">
                        Logout
                    </button>
                </form>

            </div>
        </nav>
    </x-slot>

    <!-- PAGE CONTENT -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <p class="text-gray-700 text-lg">
                    Welcome, {{ Auth::user()->name }} 👋
                </p>
            </div>
        </div>
    </div>

</x-app-layout>
