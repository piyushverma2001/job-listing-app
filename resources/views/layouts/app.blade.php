<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listing Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-white shadow mb-8">
        <div class="container mx-auto px-4 py-4">
            <a href="{{ route('jobs.index') }}" class="text-xl font-bold text-gray-800">Job Listing Platform</a>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html> 