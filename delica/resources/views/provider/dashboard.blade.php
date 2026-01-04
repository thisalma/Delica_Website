@extends('provider.layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Provider Dashboard</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <div class="bg-white p-5 rounded shadow">
        <p class="text-gray-500">Total Products</p>
        <h2 class="text-3xl font-bold text-pink-600">{{ $totalProducts }}</h2>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <p class="text-gray-500">Total Orders</p>
        <h2 class="text-3xl font-bold text-green-600">{{ $totalOrders }}</h2>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <p class="text-gray-500">Time Spent</p>
        <h2 class="text-3xl font-bold text-purple-600">2h 35m</h2>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <p class="text-gray-500">Account Status</p>
        <h2 class="text-xl font-bold text-green-600">Approved</h2>
    </div>

</div>

<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Monthly Sales</h2>
    <canvas id="salesChart"></canvas>
</div>
@endsection

@section('scripts')
<script>
const ctx = document.getElementById('salesChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($months) !!},
        datasets: [{
            label: 'Sales (Rs.)',
            data: {!! json_encode($sales) !!},
            backgroundColor: 'rgba(236, 72, 153, 0.2)',
            borderColor: 'rgba(236, 72, 153, 1)',
            borderWidth: 2,
            tension: 0.3,
            fill: true,
            pointBackgroundColor: 'white',
            pointBorderColor: 'rgba(236, 72, 153,1)',
            pointRadius: 5
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true, position: 'top' },
            tooltip: { mode: 'index', intersect: false }
        },
        scales: {
            x: { display: true, title: { display: true, text: 'Month' } },
            y: { display: true, title: { display: true, text: 'Sales (Rs.)' }, beginAtZero: true }
        }
    }
});
</script>
@endsection
