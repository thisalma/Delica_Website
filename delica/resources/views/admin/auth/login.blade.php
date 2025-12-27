<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | Delica</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

        <!-- Logo / Title -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-extrabold text-pink-600">Delica</h1>
            <p class="text-gray-500 mt-1">Admin Panel Login</p>
        </div>

        <!-- Errors -->
        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-50 p-3 text-red-600 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('admin.login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">
                    Email
                </label>
                <input type="email"
                       name="email"
                       required
                       class="w-full rounded-lg border-gray-300 focus:border-pink-500 focus:ring-pink-500"
                       placeholder="admin@delica.com">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">
                    Password
                </label>
                <input type="password"
                       name="password"
                       required
                       class="w-full rounded-lg border-gray-300 focus:border-pink-500 focus:ring-pink-500"
                       placeholder="••••••••">
            </div>

            <!-- Submit -->
            <button type="submit"
                    class="w-full py-3 bg-pink-500 hover:bg-pink-600 text-white font-bold rounded-lg transition">
                Login
            </button>
        </form>

        <!-- Footer -->
        <p class="text-center text-xs text-gray-400 mt-6">
            © {{ date('Y') }} Delica Admin System
        </p>

    </div>

</body>
</html>
