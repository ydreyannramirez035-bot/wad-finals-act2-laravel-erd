<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OrderTrack') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font (optional but clean look) -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body class="font-sans bg-gray-100">

<div class="min-h-screen flex flex-col justify-center items-center px-6">

    <!-- LOGO -->
    <div class="mb-6">
        <a href="/" class="text-2xl font-bold text-blue-600">
            OrderTrack
        </a>
    </div>

    <!-- AUTH CARD -->
    <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-6">

        {{ $slot }}

    </div>

</div>

</body>
</html>
