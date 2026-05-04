<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OrderTrack</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    </style>
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

<div id="toast-container" style="
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    gap: 10px;
"></div>

<script>
function showToast(message, type = 'success') {
    const toast = document.createElement('div');

    let bgColor = '#22c55e'; // green default
    if (type === 'error') bgColor = '#ef4444';
    if (type === 'info') bgColor = '#3b82f6';

    toast.innerText = message;

    toast.style.cssText = `
        background: ${bgColor};
        color: white;
        padding: 12px 16px;
        border-radius: 8px;
        font-family: Arial;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        min-width: 220px;
        animation: slideIn 0.3s ease;
    `;

    document.getElementById('toast-container').appendChild(toast);

    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transition = '0.5s';
        setTimeout(() => toast.remove(), 500);
    }, 3000);
}
</script>

@if (session('success'))
    <script>
        showToast(@json(session('success')), 'success');
    </script>
@endif

@if (session('error'))
    <script>
        showToast(@json(session('error')), 'error');
    </script>
@endif

</body>
</html>
