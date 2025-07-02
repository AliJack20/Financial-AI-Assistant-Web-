<x-layout>
    <x-slot:heading>
        AI-Advisor
    </x-slot:heading>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Financial Advisor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-purple-50 min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-2xl bg-white rounded-xl shadow-lg border border-gray-100 flex flex-col h-[500px]">
        <!-- Header -->
        <div class="p-4 border-b border-gray-200">
            <h1 class="text-lg font-semibold text-gray-900">AI Financial Advisor</h1>
            <p class="text-sm text-gray-600">Ask questions about your finances — all processing happens locally</p>
        </div>

        <!-- Chat Area -->
        <div class="flex-1 p-4 overflow-y-auto">
            <!-- AI Message -->
            <div class="flex justify-start">
                <div class="bg-gray-100 px-4 py-2 rounded-lg max-w-sm text-gray-900 text-sm">
                    Welcome! I'm your local AI financial advisor. <br>
                    Your data never leaves this device. How can I help you today?
                </div>
            </div>
            <!-- More messages go here in a real app -->
        </div>

        <!-- Input Area -->
        <form action="#" method="POST" class="p-4 border-t border-gray-200 flex space-x-2">  <!-- This should give a response -->
            <input
                type="text"
                placeholder="Ask about your spending patterns, budget advice..."
                class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <button
                type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                Send
            </button>
        </form>
    </div>
</body>
</html>



</x-layout>