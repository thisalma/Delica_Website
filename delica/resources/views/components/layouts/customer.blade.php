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
           <div class="hidden md:flex items-center space-x-10 font-semibold text-sm tracking-wide">

               <a href="{{ url('/customer/dashboard') }}"
   class="px-3 py-2 hover:text-pink-100 transition border-b-2 border-transparent hover:border-white">
    Home
</a>


                <a href="{{ url('/products') }}" class="px-3 py-2 hover:text-pink-100 transition border-b-2 border-transparent hover:border-white">Products</a>

<a href="{{ url('/cart') }}" class="px-3 py-2 hover:text-pink-100 transition border-b-2 border-transparent hover:border-white">Cart</a>

<a href="{{ url('/orders') }}" class="px-3 py-2 hover:text-pink-100 transition border-b-2 border-transparent hover:border-white">Order History</a>

<a href="{{ url('/profile') }}" class="px-3 py-2 hover:text-pink-100 transition border-b-2 border-transparent hover:border-white">Profile</a>

            </div>

            <!-- RIGHT: LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="bg-pink text-pink-500 px-4 py-1 rounded font-semibold hover:bg-pink-100 transition">
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
