@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">My Profile</h1>

        @if(Auth::user()->customer)
            <a href="{{ route('customers.edit', Auth::user()->customer->id) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Edit
            </a>
        @endif
    </div>

    <div class="bg-white p-6 rounded-2xl shadow">

        <p class="text-sm text-gray-500">Customer Name</p>
        <p class="text-lg font-semibold text-gray-800">
            {{ $customer->name ?? 'No profile yet' }}
        </p>

        <p class="text-sm text-gray-500 mt-4">Email</p>
        <p class="text-gray-800">
            {{ Auth::user()->email }}
        </p>

    </div>

    <div class="mt-4">
        <a href="/orders"
           class="text-gray-500 hover:text-gray-700">
            ← Back to Orders
        </a>
    </div>

</div>

@endsection
