<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Pink Navbar -->
    <div class="bg-pink-500 text-white">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-lg font-semibold">
                Welcome, {{ Auth::user()->name }}
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-pink text-pink-500 px-4 py-1 rounded hover:bg-pink-100">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Page Content -->
    <main class="py-10">
        {{ $slot }}
    </main>

</body>
</html>
