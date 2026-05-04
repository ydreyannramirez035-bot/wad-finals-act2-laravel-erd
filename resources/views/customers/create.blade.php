@extends('layouts.app')

@section('title', 'Create Customer Profile')

@section('content')

<div class="max-w-xl mx-auto">

    <h1 class="text-2xl font-bold mb-6 text-gray-800">
        Create Customer Profile
    </h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('customers.store') }}">
        @csrf

        <div class="bg-white p-6 rounded-2xl shadow space-y-4">

            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Full Name
                </label>

                <input type="text"
                       name="name"
                       required
                       placeholder="Enter your name"
                       class="mt-1 w-full p-2 border rounded-lg focus:ring focus:ring-blue-200">
            </div>

            <button type="submit"
                    class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">
                Save Profile
            </button>

        </div>
    </form>

    <a href="/dashboard"
       class="inline-block mt-4 text-gray-500 hover:text-gray-700">
        ← Back
    </a>

</div>

@endsection
