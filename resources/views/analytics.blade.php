<x-layout>
  <x-slot:heading>
    Analytics
  </x-slot:heading>

  <div>
    <canvas id="barChart" height="60"></canvas>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const monthlySavings = @json($monthlySavings);

    const months = monthlySavings.map(item => item.month);
    const savings = monthlySavings.map(item => item.savings);

    const ctxBar = document.getElementById('barChart').getContext('2d');
    new Chart(ctxBar, {
      type: 'bar',
      data: {
        labels: months,
        datasets: [{
          label: 'Monthly Savings',
          data: savings,
          backgroundColor: '#4ade80'
        }]
      }
    });
  </script>
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
</x-layout>
