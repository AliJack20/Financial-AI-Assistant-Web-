<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Transactions</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">All Transactions</h1>
        
            <div class="flex gap-x-2">
                <a href="{{ route('transactions.create') }}"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                + Add Transaction
                </a>
                <a href="/overview"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Back to Overview
                </a>
            </div>
        </div>


        <table class="min-w-full table-auto border">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $transaction->date }}</td>
                        <td class="px-4 py-2">${{ number_format($transaction->amount, 2) }}</td>
                        <td class="px-4 py-2">{{ ucfirst($transaction->type) }}</td>
                        <td class="px-4 py-2">{{ $transaction->category }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('transactions.show', $transaction->id) }}"
                               class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('transactions.edit', $transaction->id) }}"
                               class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">No transactions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
