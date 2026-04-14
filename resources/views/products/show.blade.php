@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: auto;">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Product Details</h2>

        <!-- Back Button -->
        <a href="{{ route('products.index') }}"
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

    <!-- Product Card -->
    <div style="
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        background: #fff;
        display: flex;
        flex-direction: column;
        gap: 12px;
    ">

        <div>
            <div style="font-size: 14px; color: gray;">Product Name</div>
            <div style="font-size: 18px; font-weight: bold;">
                {{ $product->product_name }}
            </div>
        </div>

        <div>
            <div style="font-size: 14px; color: gray;">Stock</div>
            <div style="font-size: 16px;">
                {{ $product->stock_quantity }}
            </div>
        </div>

        <div>
            <div style="font-size: 14px; color: gray;">Price</div>
            <div style="font-size: 16px; font-weight: bold; color: green;">
                ₱{{ number_format($product->price, 2) }}
            </div>
        </div>

    </div>

</div>
@endsection