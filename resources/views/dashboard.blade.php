@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: auto;">

    <h2 style="margin-bottom: 20px;">My Dashboard</h2>

    {{-- STATS --}}
    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; margin-bottom: 25px;">

        <div style="padding: 15px; background: #f3f4f6; border-radius: 10px;">
            <h3>Total Orders</h3>
            <p style="font-size: 22px; font-weight: bold;">{{ $totalOrders }}</p>
        </div>

        <div style="padding: 15px; background: #f3f4f6; border-radius: 10px;">
            <h3>Total Spent</h3>
            <p style="font-size: 22px; font-weight: bold;">
                ₱{{ number_format($totalSpent, 2) }}
            </p>
        </div>

    </div>

    {{-- QUICK ACTIONS --}}
    <div style="margin-bottom: 25px;">
        <a href="{{ route('orders.create') }}"
           style="background: green; color: white; padding: 10px 15px; border-radius: 6px; text-decoration: none;">
            + Create Order
        </a>

        <a href="{{ route('orders.index') }}"
           style="background: #2563eb; color: white; padding: 10px 15px; border-radius: 6px; text-decoration: none; margin-left: 10px;">
            View Orders
        </a>
    </div>

    {{-- RECENT ORDERS --}}
    <h3>Recent Orders</h3>

    @if($recentOrders->isEmpty())
        <p>No orders yet.</p>
    @else
        <div style="display: flex; flex-direction: column; gap: 10px;">

            @foreach($recentOrders as $order)
                <div style="padding: 12px; border: 1px solid #ddd; border-radius: 8px;">

                    <strong>Order #{{ $order->id }}</strong><br>

                    <small>{{ $order->order_date }}</small><br>

                    <strong style="color: green;">
                        ₱{{ number_format($order->total_amount, 2) }}
                    </strong>

                </div>
            @endforeach

        </div>
    @endif

</div>
@endsection