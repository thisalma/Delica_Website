<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Pending Approval - Delica</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-pink-500 to-pink-700 flex items-center justify-center">

    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-2xl text-center">

        <!-- Welcome -->
        <h1 class="text-3xl font-extrabold text-pink-600 mb-2">
            Welcome, {{ auth()->user()->name }} 👋
        </h1>

        <p class="text-gray-600 mb-6">
            Thank you for registering as a provider at <span class="font-semibold">Delica</span>
        </p>

        <!-- Status Card -->
        <div class="bg-pink-50 border border-pink-200 rounded-xl p-6 mb-6">
            <h2 class="text-xl font-bold text-pink-600 mb-2">
                Account Pending Approval
            </h2>
            <p class="text-gray-700 text-sm">
                Your provider account is currently under review by our admin team.
                You will gain full access once your account is approved.
            </p>
        </div>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                class="w-full py-2 rounded-lg bg-pink-600 text-white font-semibold hover:bg-pink-700 transition">
                Logout
            </button>
        </form>

    </div>

</body>
</html>
