@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold text-gray-800">Edit Product</h1>

        <a href="{{ route('products.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
            ← Back
        </a>

    </div>

    <form method="POST"
          action="{{ route('products.update', $product->id) }}"
          class="bg-white p-6 rounded-2xl shadow space-y-4">

        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">
                Product Name
            </label>

            <input type="text"
                   name="product_name"
                   value="{{ $product->product_name }}"
                   required
                   class="mt-1 w-full p-2 border rounded-lg focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">
                Stock Quantity
            </label>

            <input type="number"
                   name="stock_quantity"
                   value="{{ $product->stock_quantity }}"
                   required
                   class="mt-1 w-full p-2 border rounded-lg focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">
                Price
            </label>

            <input type="number"
                   step="0.01"
                   name="price"
                   value="{{ $product->price }}"
                   required
                   class="mt-1 w-full p-2 border rounded-lg focus:ring focus:ring-blue-200">
        </div>

        <button type="submit"
                class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-600 transition">
            Save Changes
        </button>

    </form>

</div>

@endsection
