@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- HEADER -->
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Welcome back 👋</h1>
    <p class="text-gray-500 text-sm">Here’s what’s happening in your system today.</p>
</div>

<!-- STATS CARDS -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Total Orders</p>
        <h2 class="text-3xl font-bold text-blue-600 mt-2">{{ $totalOrders }}</h2>
        <p class="text-xs text-gray-400 mt-1">All time orders</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Total Spent</p>
        <h2 class="text-3xl font-bold text-green-600 mt-2">₱{{ $totalSpent }}</h2>
        <p class="text-xs text-gray-400 mt-1">Customer spending</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Status</p>
        <h2 class="text-3xl font-bold text-purple-600 mt-2">Active</h2>
        <p class="text-xs text-gray-400 mt-1">System running normally</p>
    </div>

</div>

<!-- RECENT ORDERS -->
<div class="mt-8 bg-white rounded-2xl shadow overflow-hidden">

    <div class="p-5 border-b">
        <h3 class="font-semibold text-gray-700">Recent Orders</h3>
        <p class="text-sm text-gray-400">Latest transactions in your system</p>
    </div>

    <table class="w-full text-left">
        <thead class="bg-gray-50 text-gray-500 text-sm">
            <tr>
                <th class="py-3 px-5">Order ID</th>
                <th>Product</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @foreach($recentOrders as $order)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="py-3 px-5 font-medium">#{{ $order->id }}</td>
                <td>{{ $order->product->name }}</td>
                <td class="text-green-600 font-semibold">₱{{ $order->total }}</td>

                <td>
                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-600">
                        Completed
                    </span>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>

@endsection
