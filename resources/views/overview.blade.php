<x-layout>
    <x-slot:heading>
        Overview
    </x-slot:heading>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-purple-50 min-h-screen p-6">
    <div class="max-w-7xl mx-auto space-y-8">

        <!-- Header -->
        <header class="bg-white border-b border-gray-200 shadow-sm rounded-xl p-6 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 20h9"></path>
                        <path d="M3 20h9"></path>
                        <path d="M12 4v16"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">Financial AI Assistant</h1>
                    <p class="text-xs text-gray-500">Local-First • Privacy-Preserved</p>

                </div>
                <a href="{{ route('transactions.index') }}" 
                    class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    View All Transactions
                </a>
            </div>
            <div class="flex items-center space-x-2 bg-green-50 border border-green-200 rounded-lg px-3 py-2 text-sm">
                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 12l9 4.5-9 4.5-9-4.5L12 12z"></path>
                </svg>
                <span class="text-green-800 font-medium">100% Local Processing</span>
            </div>
        </header>

        <!-- Metric Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <p class="text-gray-600 text-sm font-medium">Monthly Income</p>
                <h2 class="text-2xl font-bold text-gray-900 mt-1">$5,200</h2>
                <div class="flex items-center mt-2">
                    <svg class="w-4 h-4 text-green-500 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M5 12l5 5L20 7"></path>
                    </svg>
                    <span class="text-sm font-medium text-green-600">+2.3%</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <p class="text-gray-600 text-sm font-medium">Total Expenses</p>
                <h2 class="text-2xl font-bold text-gray-900 mt-1">$4,300</h2>
                <div class="flex items-center mt-2">
                    <svg class="w-4 h-4 text-red-500 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M19 12l-5-5L4 17"></path>
                    </svg>
                    <span class="text-sm font-medium text-red-600">+8.7%</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <p class="text-gray-600 text-sm font-medium">Savings Rate</p>
                <h2 class="text-2xl font-bold text-gray-900 mt-1">17.3%</h2>
                <div class="flex items-center mt-2">
                    <svg class="w-4 h-4 text-red-500 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M19 12l-5-5L4 17"></path>
                    </svg>
                    <span class="text-sm font-medium text-red-600">-2.1%</span>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Line Chart -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Income vs Expenses</h3>
                <canvas id="lineChart" height="300"></canvas>
            </div>

            <!-- Pie Chart -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Spending by Category</h3>
                <canvas id="pieChart" height="300"></canvas>
            </div>
        </div>
    </div>

    <script>
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],//should receiver from somewhere
                datasets: [
                    {
                        label: 'Income',
                        data: [5200, 5200, 5200, 5200, 5200, 5200],//should receiver from somewhere
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16,185,129,0.1)',
                        tension: 0.4
                    },
                    {
                        label: 'Expenses',
                        data: [3800, 4200, 3600, 4100, 3900, 4300],//should receive from somewhere
                        borderColor: '#ef4444',
                        backgroundColor: 'rgba(239,68,68,0.1)',
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'bottom' } }
            }
        });

        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Housing', 'Food', 'Transportation', 'Entertainment', 'Healthcare', 'Shopping'],//should receiver from somewhere
                datasets: [{
                    data: [1200, 600, 400, 300, 200, 500],//should receiver from somewhere
                    backgroundColor: ['#8884d8', '#82ca9d', '#ffc658', '#ff7c7c', '#8dd1e1', '#d084d0']
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'bottom' } }
            }
        });
    </script>
</body>
</html>

</x-layout>