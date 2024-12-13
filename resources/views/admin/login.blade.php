<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Admin</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <strong>Error:</strong> {{ $errors->first() }}
        </div>
    @endif

    <div class="bg-white p-6 rounded shadow-md w-1/3">
        <h2 class="text-2xl font-bold text-center mb-6">Admin Login</h2>
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2" for="email">Email</label>
                <input type="email" name="email" id="email" class="border border-gray-300 p-2 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2" for="password">Password</label>
                <input type="password" name="password" id="password" class="border border-gray-300 p-2 rounded w-full" required>
            </div>
            <button class="bg-blue-500 text-white px-4 py-2 rounded w-full">Login</button>
        </form>
    </div>
</body>
</html>
