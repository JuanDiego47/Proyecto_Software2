<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: lightgray;">
    <x-navbar></x-navbar>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold traking-thight text-gray-900">
                {{ $heading}}
            </h1>
        </div>
    </header>
    <div class="p-10">
    {{ $slot }}
    </div>
</body>
</html>