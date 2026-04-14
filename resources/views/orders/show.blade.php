@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: auto;">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Order Details</h2>

        <a href="{{ route('orders.index') }}"
           style="
                text-decoration: none;
                background: #6b7280;
                color: white;
                padding: 8px 12px;
                border-radius: 6px;
                font-size: 14px;
           ">
            ← Back
        </a>
    </div>

    <!-- Order Info Card -->
    <div style="
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        background: #fff;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    ">

        <div>
            <div style="font-size: 13px; color: gray;">Customer</div>
            <div style="font-weight: bold;">
                {{ $order->customer->name }}
            </div>
        </div>

        <div>
            <div style="font-size: 13px; color: gray;">Order Date</div>
            <div>
                {{ $order->order_date }}
            </div>
        </div>

        <div>
            <div style="font-size: 13px; color: gray;">Total Amount</div>
            <div style="font-size: 18px; font-weight: bold; color: green;">
                ₱{{ number_format($order->total_amount, 2) }}
            </div>
        </div>

    </div>

    <!-- Products Section -->
    <h3 style="margin-bottom: 10px;">Products</h3>

    <div style="display: flex; flex-direction: column; gap: 10px;">

        @foreach($order->products as $product)
            <div style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 12px;
                border: 1px solid #ddd;
                border-radius: 8px;
                background: #fff;
            ">

                <div>
                    <div style="font-weight: bold;">
                        {{ $product->product_name }}
                    </div>

                    <div style="font-size: 13px; color: gray;">
                        ₱{{ number_format($product->price, 2) }}
                    </div>
                </div>

                <div style="
                    background: #f3f4f6;
                    padding: 5px 10px;
                    border-radius: 6px;
                    font-size: 13px;
                ">
                    Qty: {{ $product->pivot->quantity }}
                </div>

            </div>
        @endforeach

    </div>

</div>
@endsection