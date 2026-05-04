<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OrderTrack</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-50 font-sans">

<!-- NAVBAR -->
<header class="flex justify-between items-center px-10 py-5 bg-white shadow">
    <h1 class="text-xl font-bold text-blue-600">OrderTrack</h1>

    <div class="space-x-4">
        <a href="/login" class="text-gray-600 hover:text-blue-600">Login</a>
        <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Register
        </a>
    </div>
</header>

<!-- HERO -->
<section class="text-center py-20 px-6">
    <h2 class="text-4xl font-bold text-gray-800">
        Smart Order Management Made Simple
    </h2>

    <p class="text-gray-500 mt-4 max-w-xl mx-auto">
        Manage your orders, track spending, and monitor business performance
        with a simple and efficient system.
    </p>

    <div class="mt-6 space-x-4">
        <a href="/register"
           class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700">
           Get Started
        </a>
    </div>
</section>

<!-- FEATURES -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-10 pb-20">

    <div class="bg-white p-6 rounded-2xl shadow text-center">
        <h3 class="font-semibold text-lg">Easy Order Creation</h3>
        <p class="text-gray-500 mt-2 text-sm">
            Quickly create and manage orders in a simple interface.
        </p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow text-center">
        <h3 class="font-semibold text-lg">Dashboard Insights</h3>
        <p class="text-gray-500 mt-2 text-sm">
            View total orders, spending, and recent activity in real-time.
        </p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow text-center">
        <h3 class="font-semibold text-lg">Admin Control</h3>
        <p class="text-gray-500 mt-2 text-sm">
            Admins can manage products and monitor revenue easily.
        </p>
    </div>

</section>

<!-- FOOTER -->
<footer class="text-center py-6 text-gray-400 text-sm">
    © {{ date('Y') }} OrderTrack. All rights reserved.
</footer>

</body>
</html>
