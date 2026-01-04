<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Delica</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="bg-pink-600 text-white w-64 flex-shrink-0 min-h-screen p-6 flex flex-col">
        <div class="flex items-center gap-2 mb-8">
            <img src="{{ asset('images/LOGO.png') }}" alt="Delica Logo" class="w-12 h-12 rounded-full">
            <span class="text-2xl font-bold">DELICA</span>
        </div>
        
        <nav class="flex flex-col gap-3">
            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 rounded hover:bg-pink-500 transition">Dashboard</a>
            <a href="{{ route('admin.customers') }}" class="px-4 py-2 rounded hover:bg-pink-500 transition">Customers</a>
            <a href="{{ route('admin.providers') }}" class="px-4 py-2 rounded hover:bg-pink-500 transition">Providers</a>
            <a href="#" class="px-4 py-2 rounded hover:bg-pink-500 transition">Orders</a>
        </nav>

        <!-- Logout -->
        <div class="mt-auto">
            <form method="POST" action="{{ url('/admin/logout') }}">
                @csrf
                <button class="block w-full px-4 py-2 mt-6 bg-red-400 rounded hover:bg-red-500 text-center">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>
</body>
</html>
