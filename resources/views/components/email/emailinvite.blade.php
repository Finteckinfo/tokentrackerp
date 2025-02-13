<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace Invitation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Ensure the email body has some padding */
        body {
            margin: 0;
            padding: 0;
            background-color: #f8fafc; /* Light gray background */
        }
    </style>
</head>
<body>
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg overflow-hidden mt-10">
        <!-- Blue Banner -->
        <div class="bg-blue-600 p-4 text-center">
            <img src="path/to/your/logo.png" alt="Logo" class="mx-auto h-12 w-auto">
        </div>
        <!-- Email Content -->
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-800">You're Invited!</h2>
            <p class="mt-2 text-gray-600">You have been invited to join a workspace. Click the link below to accept the invitation:</p>
            <div class="mt-4">
                <a href="{{ $inviteLink }}" class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500 transition-colors">Join Workspace</a>
            </div>
            <p class="mt-4 text-gray-600">This link will expire on <strong>{{ $expirationDate->format('M d, Y H:i') }}</strong>.</p>
        </div>
    </div>
</body>
</html>
