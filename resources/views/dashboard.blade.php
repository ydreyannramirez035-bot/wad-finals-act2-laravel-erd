@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Welcome back 👋</h1>
    <p class="text-gray-500 text-sm">Here’s what’s happening in your system today.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Total Orders</p>
        <h2 class="text-3xl font-bold text-blue-600 mt-2">{{ $totalOrders }}</h2>
        <p class="text-xs text-gray-400 mt-1">All time orders</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Total Spent</p>
        <h2 class="text-3xl font-bold text-green-600 mt-2">
            ₱{{ number_format($totalSpent, 2) }}
        </h2>
        <p class="text-xs text-gray-400 mt-1">Customer spending</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Status</p>
        <h2 class="text-3xl font-bold text-purple-600 mt-2">Active</h2>
        <p class="text-xs text-gray-400 mt-1">System running normally</p>
    </div>

</div>

<div class="mt-8 bg-white rounded-2xl shadow overflow-hidden">

    <div class="p-5 border-b">
        <h3 class="font-semibold text-gray-700">Recent Orders</h3>
        <p class="text-sm text-gray-400">Latest transactions in your system</p>
    </div>

    <table class="w-full text-left">
        <thead class="bg-gray-50 text-gray-500 text-sm">
            <tr>
                <th class="py-3 px-5">Order ID</th>
                <th>Products</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @forelse($recentOrders as $order)
            <tr class="border-b hover:bg-gray-50 transition">

                <!-- ORDER ID -->
                <td class="py-3 px-5 font-medium">
                    #{{ $order->id }}
                </td>

                <!-- PRODUCTS (FIXED: belongsToMany) -->
                <td>
                    @forelse($order->products as $product)
                        {{ $product->name }} (x{{ $product->pivot->quantity }})<br>
                    @empty
                        <span class="text-gray-400">No Products</span>
                    @endforelse
                </td>

                <!-- TOTAL -->
                <td class="text-green-600 font-semibold">
                    ₱{{ number_format($order->total_amount, 2) }}
                </td>

                <!-- STATUS -->
                <td>
                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-600">
                        Completed
                    </span>
                </td>

            </tr>
            @empty

            <tr>
                <td colspan="4" class="text-center py-5 text-gray-400">
                    No recent orders found.
                </td>
            </tr>

            @endforelse

        </tbody>
    </table>

</div>

@endsection