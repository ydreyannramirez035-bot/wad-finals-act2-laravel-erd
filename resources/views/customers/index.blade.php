@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: auto;">

    <h2 style="margin-bottom: 20px;">My Profile</h2>

    @if(session('success'))
        <p style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </p>
    @endif

    @if($customer)
        <div style="
            background: white;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
        ">

            <p style="color: gray; font-size: 13px;">Name</p>
            <p style="font-size: 18px; font-weight: bold;">
                {{ $customer->name }}
            </p>

        </div>

        <div style="margin-top: 15px;">
            <a href="{{ route('customers.edit', $customer->id) }}"
               style="
                    background: #3b82f6;
                    color: white;
                    padding: 8px 12px;
                    border-radius: 6px;
                    text-decoration: none;
                    font-size: 14px;
               ">
                Edit Profile
            </a>
        </div>

    @else
        <div style="
            padding: 15px;
            border: 1px dashed #ccc;
            border-radius: 10px;
            text-align: center;
        ">
            <p>You don't have a profile yet.</p>

            <a href="{{ route('customers.create') }}"
               style="
                    display: inline-block;
                    margin-top: 10px;
                    background: green;
                    color: white;
                    padding: 10px 15px;
                    border-radius: 6px;
                    text-decoration: none;
               ">
                Create Profile
            </a>
        </div>
    @endif

</div>
@endsection