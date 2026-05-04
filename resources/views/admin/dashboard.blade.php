@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Admin Dashboard</h1>
        <p class="text-gray-500 text-sm">Overview of system performance</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-gray-500 text-sm">Total Orders</p>
            <h2 class="text-3xl font-bold text-blue-600 mt-2">{{ $totalOrders }}</h2>
            <p class="text-xs text-gray-400 mt-1">All system orders</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-gray-500 text-sm">Total Revenue</p>
            <h2 class="text-3xl font-bold text-green-600 mt-2">
                ₱{{ number_format($totalRevenue, 2) }}
            </h2>
            <p class="text-xs text-gray-400 mt-1">Gross income</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-gray-500 text-sm">Total Customers</p>
            <h2 class="text-3xl font-bold text-purple-600 mt-2">
                {{ $totalCustomers }}
            </h2>
            <p class="text-xs text-gray-400 mt-1">Registered users</p>
        </div>

    </div>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="p-5 border-b">
            <h3 class="font-semibold text-gray-700">Recent Orders</h3>
            <p class="text-sm text-gray-400">Latest transactions in the system</p>
        </div>

        <div class="divide-y">

            @foreach($recentOrders as $order)
            <div class="p-5 flex justify-between items-center hover:bg-gray-50 transition">

                <div>
                    <p class="font-semibold text-gray-800">
                        Order #{{ $order->id }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ $order->customer->name }}
                    </p>

                    <p class="text-xs text-gray-400">
                        {{ $order->order_date }}
                    </p>
                </div>

                <div class="text-right">
                    <p class="text-green-600 font-bold">
                        ₱{{ number_format($order->total_amount, 2) }}
                    </p>

                    <span class="text-xs px-3 py-1 rounded-full bg-green-100 text-green-600">
                        Paid
                    </span>
                </div>

            </div>
            @endforeach

        </div>

    </div>

</div>

@endsection
