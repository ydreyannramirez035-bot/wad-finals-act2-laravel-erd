@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="max-w-2xl mx-auto">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">My Profile</h1>
        <p class="text-gray-500 text-sm">Manage your account information</p>
    </div>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-5">
            {{ session('success') }}
        </div>
    @endif

    <!-- PROFILE CARD -->
    <div class="bg-white shadow rounded-2xl p-6">

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <!-- NAME -->
            <div class="mb-4">
                <label class="text-gray-600 text-sm">Name</label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $user->name) }}"
                       class="mt-1 w-full bg-white border border-gray-300 rounded-lg p-2
                              focus:border-blue-500 focus:ring-blue-500 text-gray-900">
            </div>

            <!-- EMAIL -->
            <div class="mb-4">
                <label class="text-gray-600 text-sm">Email</label>
                <input type="email"
                       name="email"
                       value="{{ old('email', $user->email) }}"
                       class="mt-1 w-full bg-white border border-gray-300 rounded-lg p-2
                              focus:border-blue-500 focus:ring-blue-500 text-gray-900">
            </div>

            <!-- ROLE (READ ONLY) -->
            <div class="mb-6">
                <label class="text-gray-600 text-sm">Role</label>
                <input type="text"
                       value="{{ $user->role }}"
                       disabled
                       class="mt-1 w-full bg-gray-100 border border-gray-200 rounded-lg p-2 text-gray-600">
            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Update Profile
            </button>

        </form>

    </div>

</div>

@endsection
