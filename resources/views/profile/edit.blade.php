@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: auto;">

    <h2 style="margin-bottom: 20px;">My Profile</h2>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div style="
            background: #e6ffed;
            color: #1a7f37;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        ">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        {{-- NAME --}}
        <div style="margin-bottom: 15px;">
            <label>Name</label><br>
            <input type="text"
                   name="name"
                   value="{{ old('name', $user->name) }}"
                   style="width: 100%; padding: 10px;">
        </div>

        {{-- EMAIL --}}
        <div style="margin-bottom: 15px;">
            <label>Email</label><br>
            <input type="email"
                   name="email"
                   value="{{ old('email', $user->email) }}"
                   style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Role</label><br>
            <input type="text"
                value="{{ $user->role }}"
                disabled
                style="width: 100%; padding: 10px; background: #f3f4f6;">
        </div>

        <button type="submit"
                style="
                    background: #2563eb;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 6px;
                    cursor: pointer;
                ">
            Update Profile
        </button>

    </form>

</div>
@endsection