<x-layout>
  <x-slot:heading>
    Financial Overview
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

      <!-- Financial Cards -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Income -->
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
          <p class="text-gray-600 text-sm font-medium">Monthly Income</p>
          <h2 class="text-2xl font-bold text-gray-900 mt-1">${{ number_format($income, 2) }}</h2>
          <div class="flex items-center mt-2">
            <svg class="w-4 h-4 {{ $incomeTrend >= 0 ? 'text-green-500' : 'text-red-500' }} mr-1" fill="none"
                 stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              @if($incomeTrend >= 0)
                <path d="M5 12l5 5L20 7"></path>
              @else
                <path d="M19 12l-5-5L4 17"></path>
              @endif
            </svg>
            <span class="text-sm font-medium {{ $incomeTrend >= 0 ? 'text-green-600' : 'text-red-600' }}">
              {{ number_format($incomeTrend, 1) }}%
            </span>
          </div>
        </div>

        <!-- Expenses -->
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
          <p class="text-gray-600 text-sm font-medium">Total Expenses</p>
          <h2 class="text-2xl font-bold text-gray-900 mt-1">${{ number_format($expenses, 2) }}</h2>
          <div class="flex items-center mt-2">
            <svg class="w-4 h-4 {{ $expenseTrend >= 0 ? 'text-red-500' : 'text-green-500' }} mr-1" fill="none"
                 stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              @if($expenseTrend >= 0)
                <path d="M19 12l-5-5L4 17"></path> <!-- Up = bad for expenses -->
              @else
                <path d="M5 12l5 5L20 7"></path> <!-- Down = good for expenses -->
              @endif
            </svg>
            <span class="text-sm font-medium {{ $expenseTrend >= 0 ? 'text-red-600' : 'text-green-600' }}">
              {{ number_format($expenseTrend, 1) }}%
            </span>
          </div>
        </div>

        <!-- Savings Rate -->
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
          <p class="text-gray-600 text-sm font-medium">Savings Rate</p>
          <h2 class="text-2xl font-bold text-gray-900 mt-1">{{ number_format($savingsRate, 1) }}%</h2>
          <div class="flex items-center mt-2">
            <svg class="w-4 h-4 text-blue-500 mr-1" fill="none"
                 stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M5 12l5 5L20 7"></path>
            </svg>
            <span class="text-sm font-medium text-blue-600">
              Based on Income & Expenses
            </span>
          </div>
        </div>
      </div>

      <!-- Charts -->
      <div class="mb-8">
        <canvas id="lineChart" height="60"></canvas>
      </div>

      <div style="width: 500px; height: 500px;">
        <canvas id="pieChart"></canvas>
    </div>


    </div>

    <script>
      const monthlyData = @json($monthlyData);
      const categoryData = @json($categoryData);

      const months = monthlyData.map(item => item.month);
      const incomes = monthlyData.map(item => item.income);
      const expenses = monthlyData.map(item => item.expenses);

      const ctxLine = document.getElementById('lineChart').getContext('2d');
      new Chart(ctxLine, {
        type: 'line',
        data: {
          labels: months,
          datasets: [
            {
              label: 'Income',
              data: incomes,
              borderColor: '#10b981',
              backgroundColor: '#10b98122',
              fill: true,
              tension: 0.4
            },
            {
              label: 'Expenses',
              data: expenses,
              borderColor: '#ef4444',
              backgroundColor: '#ef444422',
              fill: true,
              tension: 0.4
            }
          ]
        }
      });

      const ctxPie = document.getElementById('pieChart').getContext('2d');
      new Chart(ctxPie, {
        type: 'pie',
        data: {
          labels: categoryData.map(item => item.category),
          datasets: [{
            data: categoryData.map(item => item.total),
            backgroundColor: [
              '#f87171',
              '#fb923c',
              '#facc15',
              '#4ade80',
              '#38bdf8',
              '#a78bfa'
            ]
          }]
        }
      });
    </script>
  </body>
  </html>
</x-layout>
