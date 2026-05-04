@extends('layouts.app')

@section('title', 'Order Details')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold text-gray-800">Order Details</h1>

        <a href="{{ route('orders.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
            ← Back
        </a>

    </div>

    <div class="bg-white p-6 rounded-2xl shadow mb-6 space-y-3">

        <div>
            <p class="text-sm text-gray-500">Customer</p>
            <p class="font-semibold text-gray-800">
                {{ $order->customer->name }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Order Date</p>
            <p class="text-gray-700">
                {{ $order->order_date }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Total Amount</p>
            <p class="text-xl font-bold text-green-600">
                ₱{{ number_format($order->total_amount, 2) }}
            </p>
        </div>

    </div>

    <h2 class="text-lg font-semibold mb-3 text-gray-800">Products</h2>

    <div class="space-y-3">

        @foreach($order->products as $product)

        <div class="bg-white p-4 rounded-2xl shadow flex justify-between items-center">

            <div>
                <p class="font-semibold text-gray-800">
                    {{ $product->product_name }}
                </p>

                <p class="text-sm text-gray-500">
                    ₱{{ number_format($product->price, 2) }}
                </p>
            </div>

            <div class="bg-gray-100 px-3 py-1 rounded-lg text-sm text-gray-700">
                Qty: {{ $product->pivot->quantity }}
            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection
