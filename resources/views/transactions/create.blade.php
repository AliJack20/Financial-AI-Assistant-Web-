<x-layout>
    <x-slot:heading>
        Enter Transaction
    </x-slot:heading>

    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf
        
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Create a New Transaction</h2>
      <p class="mt-1 text-sm/6 text-gray-600">Need Some Details.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
          <x-form-label for="title">Date</x-form-label>
          <div class="mt-2">
            <x-form-input  name="date" id="date" placeholder="YYYY-MM-DD" />

            <x-form-error name="date" />
          </div>
        </x-form-field>

        <x-form-field>
          <x-form-label for="title">Amount</x-form-label>
          <div class="mt-2">
            <x-form-input  name="amount" id="salary" placeholder="500000" />

            <x-form-error name="amount" />
          </div>
        </x-form-field>

        <x-form-field>
          <x-form-label for="title">Type</x-form-label>
          <div class="mt-2">
            <x-form-input  name="type" id="type" placeholder="Income" />

            <x-form-error name="type" />
          </div>
        </x-form-field>

        <x-form-field>
          <x-form-label for="title">Category</x-form-label>
          <div class="mt-2">
            <x-form-input  name="category" id="category" placeholder="Shopping" />

            <x-form-error name="category" />
          </div>
        </x-form-field>

        <x-form-field>
          <x-form-label for="title">Description</x-form-label>
          <div class="mt-2">
            <x-form-input  name="description" id="description" placeholder="" />

            <x-form-error name="description" />
          </div>
        </x-form-field>

        <x-form-field>
          <x-form-label for="title">Payment Method</x-form-label>
          <div class="mt-2">
            <x-form-input  name="payment_method" id="payment_method" placeholder="" />

            <x-form-error name="payment_method" />
          </div>
        </x-form-field>

        <x-form-field>
          <x-form-label for="title">Merchant</x-form-label>
          <div class="mt-2">
            <x-form-input  name="merchant" id="merchant" placeholder="" />

            <x-form-error name="merchant" />
          </div>
        </x-form-field>


  </div>


  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="{{ route('transactions.index') }}" class="text-sm font-semibold text-gray-900">
      Cancel
    </a>

    <x-form-button>Save</x-form-button>
  </div>
</form>
</x-layout>