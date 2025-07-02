<x-layout>
  <x-slot:heading>
    Transaction Details
  </x-slot:heading>

  <div class="bg-white shadow rounded-lg p-6 max-w-md">
    <div class="mb-4">
      <h2 class="text-xl font-bold text-gray-900">Date:</h2>
      <p class="text-gray-700">{{ $transaction->date }}</p>
    </div>

    <div class="mb-4">
      <h2 class="text-xl font-bold text-gray-900">Amount:</h2>
      <p class="text-gray-700">${{ number_format($transaction->amount, 2) }}</p>
    </div>

    <div class="mb-4">
      <h2 class="text-xl font-bold text-gray-900">Type:</h2>
      <p class="text-gray-700 capitalize">{{ $transaction->type }}</p>
    </div>

    <div class="mb-4">
      <h2 class="text-xl font-bold text-gray-900">Category:</h2>
      <p class="text-gray-700">{{ $transaction->category }}</p>
    </div>

    @if($transaction->description)
      <div class="mb-4">
        <h2 class="text-xl font-bold text-gray-900">Description:</h2>
        <p class="text-gray-700">{{ $transaction->description }}</p>
      </div>
    @endif

    <div class="mt-6">
      <a href="{{ route('transactions.index') }}"
         class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
        Back to Transactions
      </a>
    </div>
  </div>
</x-layout>
