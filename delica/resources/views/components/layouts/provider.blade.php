<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Provider Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Sidebar (optional) -->
    <aside class="w-64 bg-white p-4 float-left h-screen">
        <h2 class="font-bold text-xl mb-4">Provider Menu</h2>
        <ul>
            <li><a href="{{ route('provider.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('provider.products.index') }}">Products</a></li>
            <li><a href="{{ route('provider.orders') }}">Orders</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 p-6">
        {{ $slot }}
    </main>

</body>
</html>
