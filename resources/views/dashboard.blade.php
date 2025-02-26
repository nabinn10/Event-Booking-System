@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-5">
        <a href="{{ route('users.index') }}">
            <div class="bg-blue-500 rounded-lg text-white p-4 shadow-md">
                <h2 class="text-xl font-semibold">Total Users</h2>
                <p class="text-2xl font-bold text-right">{{ $totalusers }}</p>
            </div>
        </a>
        <a href="{{ route('orders.index') }}">
            <div class="bg-yellow-500 rounded-lg text-white p-4 shadow-md">
                <h2 class="text-xl font-semibold">Total Orders</h2>
                <p class="text-2xl font-bold text-right">{{ $totalorders }}</p>
            </div>
        </a>
        <a href="{{ route('items.index') }}">
            <div class="bg-red-500 rounded-lg text-white p-4 shadow-md">
                <h2 class="text-xl font-semibold">Available Items</h2>
                <p class="text-2xl font-bold text-right">{{ $totalitems }}</p>
            </div>
        </a>
        <a href="{{ route('packages.index') }}">
            <div class="bg-green-500 rounded-lg text-white p-4 shadow-md">
                <h2 class="text-xl font-semibold">Total Packages</h2>
                <p class="text-2xl font-bold text-right">{{ $totalpackages }}</p>
            </div>
        </a>
    </div>

    <!-- Order Status Pie Chart and Monthly Packages Bar Chart (Horizontal Layout) -->
    <div class="my-10 grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
            <h3 class="text-xl font-semibold mb-4">Order Status Distribution</h3>
            <div class="w-full h-64">
                <canvas id="orderStatusChart"></canvas>
            </div>
        </div>
        
        <div>
            <h3 class="text-xl font-semibold mb-4">Monthly Packages Booked</h3>
            <div class="w-full h-64">
                <canvas id="monthlyPackagesChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Order Status Data for Pie Chart
        const orderStatusData = @json($orderStatusData);
        const orderStatuses = orderStatusData.map(order => order.status);
        const orderCounts = orderStatusData.map(order => order.count);

        // Order Status Pie Chart
        const ctxOrderStatus = document.getElementById('orderStatusChart').getContext('2d');
        new Chart(ctxOrderStatus, {
            type: 'pie',
            data: {
                labels: orderStatuses,
                datasets: [{
                    label: 'Order Status',
                    data: orderCounts,
                    backgroundColor: ['#FF5733', '#C70039', '#900C3F', '#581845'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });

        // Monthly Packages Data for Bar Chart
        const monthlyPackagesData = @json($monthlyPackages);
        const months = monthlyPackagesData.map(order => order.month);
        const packageCounts = monthlyPackagesData.map(order => order.count);

        // Monthly Packages Bar Chart
        const ctxMonthlyPackages = document.getElementById('monthlyPackagesChart').getContext('2d');
        new Chart(ctxMonthlyPackages, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Packages Booked',
                    data: packageCounts,
                    backgroundColor: '#4caf50',
                    borderColor: '#388e3c',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Number of Packages'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
