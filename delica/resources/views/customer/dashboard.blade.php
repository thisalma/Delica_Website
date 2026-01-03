<x-app-layout>

    <!-- CUSTOM NAVBAR -->
    <x-slot name="header">
        <nav class="bg-pink-600 text-white px-6 py-4 flex justify-between items-center shadow-md">

            <!-- LEFT: Welcome Name -->
            <div class="text-lg font-semibold">
                Welcome, {{ Auth::user()->name }}
            </div>

            <!-- RIGHT: Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="bg-white text-pink-600 px-4 py-2 rounded-lg font-semibold hover:bg-pink-100 transition">
                    Logout
                </button>
            </form>

        </nav>
    </x-slot>

    <!-- PAGE CONTENT -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <p class="text-gray-700 text-lg">
                    Welcome to your customer dashboard!
                </p>
            </div>
        </div>
    </div>

</x-app-layout>
