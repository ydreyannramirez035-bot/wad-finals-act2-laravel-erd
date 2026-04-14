@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: auto;">

    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>My Profile</h2>

        <a href="{{ route('customers.edit', Auth::user()->customer->id ?? 1) }}"
           style="
                background: #3b82f6;
                color: white;
                padding: 8px 12px;
                border-radius: 6px;
                text-decoration: none;
                font-size: 14px;
           ">
            Edit
        </a>
    </div>

    <div style="
        margin-top: 15px;
        background: white;
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #ddd;
    ">

        <p style="color: gray; font-size: 13px;">Customer Name</p>
        <p style="font-size: 18px; font-weight: bold;">
            {{ $customer->name }}
        </p>

        <p style="color: gray; font-size: 13px; margin-top: 10px;">Email</p>
        <p>{{ Auth::user()->email }}</p>

    </div>

    <a href="{{ url('/orders') }}"
       style="display: inline-block; margin-top: 15px; color: gray;">
        ← Back to Orders
    </a>

</div>
@endsection