@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="max-w-2xl mx-auto">

    <h1 class="text-2xl font-bold mb-6 text-gray-800">My Profile</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if($customer)

        <div class="bg-white p-6 rounded-2xl shadow">

            <p class="text-sm text-gray-500">Name</p>
            <p class="text-xl font-semibold text-gray-800 mt-1">
                {{ $customer->name }}
            </p>

        </div>

        <div class="mt-4">
            <a href="{{ route('customers.edit', $customer->id) }}"
               class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Edit Profile
            </a>
        </div>

    @else

        <div class="bg-white p-6 rounded-2xl shadow text-center border border-dashed">

            <p class="text-gray-600">You don't have a profile yet.</p>

            <a href="{{ route('customers.create') }}"
               class="inline-block mt-4 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                Create Profile
            </a>

        </div>

    @endif

</div>

@endsection
