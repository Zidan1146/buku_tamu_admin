<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200 h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Create Admin</h2>

        <div class="mb-4">
            @isset($existingAdmin)
                <p>Existing Admin:</p>
                <p>Username: {{ $existingAdmin->username }}</p>
                <p>Password: ********</p>
                <p class="mt-2">A new admin will be created. Please remember the new credentials.</p>
            @endif

            <p>New Admin:</p>
            <p>Username: {{ $newUsername }}</p>
            <p>Password: {{ $newPassword }}</p>
            <p class="mt-2">Please remember the new credentials.</p>
        </div>

        <form method="POST" action="api/create-admin">
            @csrf

            <input type="hidden" id="data-username" name="data-username" value="{{ $newUsername }}">
            <input type="hidden" id="data-password" name="data-password" value="{{ $newPassword }}">

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">OK</button>
                <a href="login" class="bg-gray-400 text-gray-800 px-4 py-2 rounded hover:bg-gray-500 focus:outline-none focus:bg-gray-500">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>
