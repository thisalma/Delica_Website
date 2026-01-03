<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- PINK NAVBAR -->
    <nav class="bg-pink-500 text-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <!-- LEFT: Welcome -->
            <div class="font-semibold text-lg">
                Welcome, {{ Auth::user()->name }}
            </div>

            <!-- CENTER: NAVIGATION -->
            <div class="hidden md:flex space-x-6 font-medium">
                <a href="{{ url('/customer/dashboard') }}"
                   class="hover:text-pink-100 border-b-2 border-white">
                    Home
                </a>

                <a href="{{ url('/products') }}"
                   class="hover:text-pink-100">
                    Products
                </a>

                <a href="{{ url('/cart') }}"
                   class="hover:text-pink-100">
                    Cart
                </a>

                <a href="{{ url('/orders') }}"
                   class="hover:text-pink-100">
                    Order History
                </a>

                <a href="{{ url('/profile') }}"
                   class="hover:text-pink-100">
                    Profile
                </a>
            </div>

            <!-- RIGHT: LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="bg-white text-pink-500 px-4 py-1 rounded font-semibold hover:bg-pink-100 transition">
                    Logout
                </button>
            </form>

        </div>
    </nav>

    <!-- PAGE CONTENT -->
    <main class="py-10">
        {{ $slot }}
    </main>

</body>
</html>
