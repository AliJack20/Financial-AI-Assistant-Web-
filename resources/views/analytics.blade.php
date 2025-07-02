<x-layout>
    <x-slot:heading>
        Analytics
    </x-slot:heading>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Analytics</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-purple-50 min-h-screen p-6">
    <div class="max-w-5xl mx-auto space-y-8">
        <!-- Header -->
        <header class="bg-white border-b border-gray-200 shadow-sm rounded-xl p-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detailed Analytics</h1>
                <p class="text-sm text-gray-600">Insights about your monthly spending & privacy status</p>
            </div>
        </header>

        <!-- Bar Chart -->   <!-- This should come from somewhere -->
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Monthly Spending</h3>
            <canvas id="barChart" height="100"></canvas>
        </div>

        <!-- Pattern Detection & Privacy Status --> <!-- This should come from somewhere -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Pattern Detection -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <h4 class="text-lg font-semibold text-gray-900 mb-4">Pattern Detection</h4>
                <div class="space-y-3">
                    <div class="flex justify-between text-gray-700">
                        <span>Recurring Payments</span>
                        <span class="font-semibold">8 detected</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>Spending Spikes</span>
                        <span class="font-semibold">3 this month</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>Seasonal Trends</span>
                        <span class="font-semibold">2 identified</span>
                    </div>
                </div>
            </div>

            <!-- Privacy Status --> 
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <h4 class="text-lg font-semibold text-gray-900 mb-4">Privacy Status</h4>
                <div class="space-y-3">
                    <div class="flex justify-between text-gray-700">
                        <span>Data Location</span>
                        <span class="font-semibold text-green-600">Local Device</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>AI Processing</span>
                        <span class="font-semibold text-green-600">On-Device</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>External Calls</span>
                        <span class="font-semibold text-red-600">None</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const barCtx = document.getElementById('barChart').getContext('2d'); 
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],  //This should come from somewhere
                datasets: [{
                    label: 'Monthly Spending',
                    data: [3800, 4200, 3600, 4100, 3900, 4300],  //This should come from somewhere
                    backgroundColor: '#3b82f6'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>



</x-layout>