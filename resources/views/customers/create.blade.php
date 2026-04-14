@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: auto;">

    <h2 style="margin-bottom: 20px;">Create Customer Profile</h2>

    @if(session('success'))
        <p style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </p>
    @endif

    <form method="POST" action="{{ route('customers.store') }}">
        @csrf

        <div style="
            background: white;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        ">

            <label style="font-weight: bold;">Full Name</label>
            <input type="text"
                   name="name"
                   required
                   placeholder="Enter your name"
                   style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 6px; border: 1px solid #ccc;">

            <button type="submit"
                    style="
                        margin-top: 15px;
                        width: 100%;
                        padding: 10px;
                        background: green;
                        color: white;
                        border: none;
                        border-radius: 6px;
                    ">
                Save Profile
            </button>

        </div>
    </form>

    <a href="{{ url('/dashboard') }}"
       style="display: inline-block; margin-top: 15px; color: gray;">
        ← Back
    </a>

</div>
@endsection