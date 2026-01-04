<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Provider Dashboard') - Delica</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-pink-600 text-white flex-shrink-0 min-h-screen p-6 flex flex-col">
        <div class="flex items-center gap-2 mb-8">
            <span class="text-2xl font-bold">DELICA</span>
        </div>

        <nav class="flex flex-col gap-3">
            <a href="{{ route('provider.dashboard') }}" class="px-4 py-2 rounded hover:bg-pink-500 transition">Dashboard</a>
            <a href="{{ route('products.index') }}" class="px-4 py-2 rounded hover:bg-pink-500 transition">Manage Products</a>
            <a href="{{ route('provider.orders') }}" class="px-4 py-2 rounded hover:bg-pink-500 transition">Orders</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full px-4 py-2 mt-6 bg-red-400 rounded hover:bg-red-500">Logout</button>
            </form>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>
