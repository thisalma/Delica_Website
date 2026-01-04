<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Customers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="bg-pink-600 text-white w-64 min-h-screen p-6 flex flex-col">
        <div class="flex items-center gap-2 mb-8">
            <img src="{{ asset('images/LOGO.png') }}" class="w-12 h-12 rounded-full">
            <span class="text-2xl font-bold">DELICA</span>
        </div>

        <nav class="flex flex-col gap-3">
            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 rounded hover:bg-pink-500">
                Dashboard
            </a>
            <a href="{{ route('admin.customers') }}" class="px-4 py-2 rounded bg-pink-500">
                Customers
            </a>
            <a href="#" class="px-4 py-2 rounded hover:bg-pink-500">
                Providers
            </a>
            <a href="#" class="px-4 py-2 rounded hover:bg-pink-500">
                Orders
            </a>
        </nav>

        <div class="mt-auto">
            <form method="POST" action="{{ url('/admin/logout') }}">
                @csrf
                <button class="w-full px-4 py-2 mt-6 bg-red-400 rounded hover:bg-red-500">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            Registered Customers
        </h1>

        @if($customers->isEmpty())
            <p class="bg-white p-4 rounded shadow text-gray-700">
                No customers registered yet.
            </p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-xl shadow">
                    <thead class="bg-pink-600 text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">#</th>
                            <th class="py-3 px-4 text-left">Name</th>
                            <th class="py-3 px-4 text-left">Email</th>
                            <th class="py-3 px-4 text-left">Phone</th>
                            <th class="py-3 px-4 text-left">Address</th>
                            <th class="py-3 px-4 text-left">Registered On</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-700">
                        @foreach($customers as $index => $customer)
                            <tr class="{{ $index % 2 === 0 ? 'bg-gray-50' : '' }}">
                                <td class="py-2 px-4">{{ $index + 1 }}</td>
                                <td class="py-2 px-4">{{ $customer->name }}</td>
                                <td class="py-2 px-4">{{ $customer->email }}</td>
                                <td class="py-2 px-4">{{ $customer->phone ?? '-' }}</td>
                                <td class="py-2 px-4">{{ $customer->address ?? '-' }}</td>
                                <td class="py-2 px-4">
                                    {{ $customer->created_at->format('d M Y') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </main>

</body>
</html>
