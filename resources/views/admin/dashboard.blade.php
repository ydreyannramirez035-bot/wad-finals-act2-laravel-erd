@extends('layouts.app')

@section('content')
<div style="max-width: 1000px; margin: auto;">

    <h2 style="margin-bottom: 20px;">Admin Dashboard</h2>

    {{-- STATS CARDS --}}
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 25px;">

        <div style="padding: 15px; background: #f3f4f6; border-radius: 10px;">
            <h3>Total Orders</h3>
            <p style="font-size: 22px; font-weight: bold;">{{ $totalOrders }}</p>
        </div>

        <div style="padding: 15px; background: #f3f4f6; border-radius: 10px;">
            <h3>Total Revenue</h3>
            <p style="font-size: 22px; font-weight: bold;">
                ₱{{ number_format($totalRevenue, 2) }}
            </p>
        </div>

        <div style="padding: 15px; background: #f3f4f6; border-radius: 10px;">
            <h3>Total Customers</h3>
            <p style="font-size: 22px; font-weight: bold;">{{ $totalCustomers }}</p>
        </div>

    </div>

    {{-- RECENT ORDERS --}}
    <h3>Recent Orders</h3>

    <div style="margin-top: 10px; display: flex; flex-direction: column; gap: 10px;">

        @foreach($recentOrders as $order)
            <div style="padding: 12px; border: 1px solid #ddd; border-radius: 8px;">

                <strong>Order #{{ $order->id }}</strong><br>

                <small>{{ $order->customer->name }}</small><br>

                <small>{{ $order->order_date }}</small><br>

                <strong style="color: green;">
                    ₱{{ number_format($order->total_amount, 2) }}
                </strong>

            </div>
        @endforeach

    </div>

</div>
@endsection