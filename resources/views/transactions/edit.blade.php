<x-layout>
  <x-slot:heading>
    Edit Transaction: {{ $transaction->id }}
  </x-slot:heading>

  <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
    @csrf
    @method('PATCH')

    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">

        <!-- Date -->
        <div class="sm:col-span-4">
          <label for="date" class="block text-sm font-medium text-gray-900">Date</label>
          <div class="mt-2">
            <input
              type="date"
              name="date"
              id="date"
              value="{{ $transaction->date }}"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
              required
            >
          </div>
        </div>

        <!-- Amount -->
        <div class="sm:col-span-4 mt-4">
          <label for="amount" class="block text-sm font-medium text-gray-900">Amount</label>
          <div class="mt-2">
            <input
              type="number"
              name="amount"
              id="amount"
              value="{{ $transaction->amount }}"
              step="0.01"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
              required
            >
          </div>
        </div>

        <!-- Type -->
        <div class="sm:col-span-4 mt-4">
          <label for="type" class="block text-sm font-medium text-gray-900">Type</label>
          <div class="mt-2">
            <select
              name="type"
              id="type"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
              required
            >
              <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Income</option>
              <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Expense</option>
            </select>
          </div>
        </div>

        <!-- Category -->
        <div class="sm:col-span-4 mt-4">
          <label for="category" class="block text-sm font-medium text-gray-900">Category</label>
          <div class="mt-2">
            <input
              type="text"
              name="category"
              id="category"
              value="{{ $transaction->category }}"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
              required
            >
          </div>
        </div>

        <!-- Description -->
        <div class="sm:col-span-4 mt-4">
          <label for="description" class="block text-sm font-medium text-gray-900">Description</label>
          <div class="mt-2">
            <textarea
              name="description"
              id="description"
              rows="3"
              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            >{{ $transaction->description }}</textarea>
          </div>
        </div>

      </div>

      <!-- Validation Errors -->
      <div class="mt-4">
        @if($errors->any())
          <ul class="text-red-500">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        @endif
      </div>

      <!-- Actions -->
      <div class="mt-6 flex items-center gap-x-6">
        <a href="{{ route('transactions.index') }}" class="text-sm font-semibold text-gray-900">Cancel</a>
        <button type="submit"
          class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
          Update
        </button>
      </div>
    </div>
  </form>
</x-layout>
