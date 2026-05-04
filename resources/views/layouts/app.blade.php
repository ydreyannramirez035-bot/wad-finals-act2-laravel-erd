<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OrderTrack</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

<div class="flex h-screen">

    <aside class="w-64 bg-white shadow-lg">
        <div class="p-6 text-xl font-bold border-b">
            OrderTrack
        </div>

        <nav class="p-4 space-y-2">

            <a href="/dashboard" class="block px-4 py-2 rounded-lg hover:bg-gray-100">
                Dashboard
            </a>

            @if(auth()->user()->role === 'admin')
                <a href="/admin/dashboard" class="block px-4 py-2 rounded-lg hover:bg-gray-100">
                    Admin Dashboard
                </a>

                <a href="/products" class="block px-4 py-2 rounded-lg hover:bg-gray-100">
                    Products
                </a>

                <a href="/orders" class="block px-4 py-2 rounded-lg hover:bg-gray-100">
                    Orders
                </a>
            @else
                <a href="/orders" class="block px-4 py-2 rounded-lg hover:bg-gray-100">
                    My Orders
                </a>
            @endif

            <a href="/profile" class="block px-4 py-2 rounded-lg hover:bg-gray-100">
                Profile
            </a>

        </nav>
    </aside>

    <!-- MAIN -->
    <div class="flex-1 flex flex-col">

        <!-- TOPBAR -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-lg font-semibold">@yield('title')</h1>

            <div class="flex items-center gap-4">
                <span class="text-gray-600">
                    {{ auth()->user()->name }}
                </span>

                <form method="POST" action="/logout">
                    @csrf
                    <button class="text-red-500 hover:underline">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="p-6 overflow-y-auto">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
