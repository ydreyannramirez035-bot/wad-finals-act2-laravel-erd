@extends('layouts.app')

@section('title', 'Product Details')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold text-gray-800">Product Details</h1>

        <a href="{{ route('products.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
            ← Back
        </a>

    </div>

    <div class="bg-white p-6 rounded-2xl shadow space-y-4">

        <!-- NAME -->
        <div>
            <p class="text-sm text-gray-500">Product Name</p>
            <p class="text-xl font-semibold text-gray-800">
                {{ $product->product_name }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Stock</p>
            <p class="text-gray-800 text-lg">
                {{ $product->stock_quantity }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Price</p>
            <p class="text-xl font-bold text-green-600">
                ₱{{ number_format($product->price, 2) }}
            </p>
        </div>

    </div>

</div>

@endsection
