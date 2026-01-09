<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Delica</title>

    <!-- Tailwind -->
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
            <a href="{{ url('/admin/dashboard') }}" class="px-4 py-2 rounded bg-pink-500 transition">
                Dashboard
            </a>
            <a href="{{ url('/admin/customers') }}" class="px-4 py-2 rounded hover:bg-pink-500 transition">
                Customers
            </a>
            <a href="{{ url('/admin/providers') }}" class="px-4 py-2 rounded hover:bg-pink-500 transition">
                Providers
            </a>
        </nav>

        <!-- Logout -->
        <div class="mt-auto">
            <form method="POST" action="{{ url('/admin/logout') }}">
                @csrf
                <button
                    class="block w-full px-4 py-2 mt-6 bg-red-400 rounded hover:bg-red-500 text-center">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 space-y-6">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            Welcome, Admin!
        </h1>

        <!-- Top Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ url('/admin/customers') }}"
               class="block bg-white p-6 rounded-xl shadow text-center hover:shadow-lg transition">
                <h3 class="text-xl font-bold mb-2">Customers</h3>
                <p class="text-gray-600">View all registered customers</p>
            </a>

            <a href="{{ url('/admin/providers') }}"
               class="block bg-white p-6 rounded-xl shadow text-center hover:shadow-lg transition">
                <h3 class="text-xl font-bold mb-2">Providers</h3>
                <p class="text-gray-600">Manage providers</p>
            </a>
        </div>

        <!-- Notes Section -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Target</h2>
            <textarea
                placeholder="Type your notes here..."
                class="w-full h-32 p-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-500">
            </textarea>
        </div>

        <!-- Calendar Section -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Calendar</h2>

            <div id="monthYear" class="text-center text-lg font-semibold mb-2"></div>
            <div id="calendar" class="grid grid-cols-7 gap-2 text-center"></div>
        </div>

    </main>

    <!-- Calendar Script -->
    <script>
        const calendar = document.getElementById("calendar");
        const monthYear = document.getElementById("monthYear");

        const today = new Date();
        const year = today.getFullYear();
        const month = today.getMonth();

        const monthNames = [
            "January","February","March","April","May","June",
            "July","August","September","October","November","December"
        ];

        monthYear.innerText = `${monthNames[month]} ${year}`;

        const days = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
        days.forEach(day => {
            const el = document.createElement("div");
            el.className = "font-bold";
            el.innerText = day;
            calendar.appendChild(el);
        });

        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        for(let i = 0; i < firstDay; i++) {
            calendar.appendChild(document.createElement("div"));
        }

        for(let d = 1; d <= lastDate; d++) {
            const el = document.createElement("div");
            el.innerText = d;
            el.className = "p-2 rounded-full cursor-pointer hover:bg-pink-200 transition";

            if(d === today.getDate()) {
                el.classList.add("bg-pink-500","text-white");
            }

            calendar.appendChild(el);
        }
    </script>

</body>
</html>
