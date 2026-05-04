@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold text-gray-800">Products</h1>

        <a href="{{ route('products.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
            + Add Product
        </a>

    </div>

    <div class="space-y-4">

        @foreach($products as $product)

        <div class="bg-white p-5 rounded-2xl shadow flex justify-between items-center">

            <div>

                <p class="font-semibold text-gray-800 text-lg">
                    {{ $product->product_name }}
                </p>

                <p class="text-sm text-gray-500">
                    Stock: {{ $product->stock_quantity }}
                </p>

                <p class="mt-1 font-bold text-gray-800">
                    ₱{{ number_format($product->price, 2) }}
                </p>

            </div>

            <div class="flex items-center gap-4">

                <a href="{{ route('products.show', $product->id) }}"
                   class="text-blue-600 hover:underline">
                    View
                </a>

                <a href="{{ route('products.edit', $product->id) }}"
                   class="text-yellow-600 hover:underline">
                    Edit
                </a>

                <form method="POST"
                      action="{{ route('products.destroy', $product->id) }}"
                      onsubmit="return confirm('Are you sure you want to delete this product?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="text-red-600 hover:underline">
                        Delete
                    </button>

                </form>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection
