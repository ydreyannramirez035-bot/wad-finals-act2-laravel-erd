@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="max-w-xl mx-auto">

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Customer</h2>
        <p class="text-gray-500 text-sm">Update customer information</p>
    </div>

    <div class="bg-white shadow rounded-2xl p-6">

        <form method="POST" action="/customers/{{ $customer->id }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="text-gray-600 text-sm">Name</label>

                <input
                    name="name"
                    value="{{ $customer->name }}"
                    class="mt-1 w-full bg-white border border-gray-300 rounded-lg p-2
                           focus:border-blue-500 focus:ring-blue-500 text-gray-900"
                >
            </div>

            <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Update Customer
            </button>

        </form>

    </div>

</div>

@endsection
