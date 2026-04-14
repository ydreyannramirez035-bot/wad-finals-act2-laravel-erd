@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: auto;">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Create Product</h2>

        <!-- BACK BUTTON -->
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

    <form method="POST" action="{{ route('products.store') }}"
          style="
              display: flex;
              flex-direction: column;
              gap: 12px;
              padding: 20px;
              border: 1px solid #ddd;
              border-radius: 10px;
              background: #fff;
          ">
        @csrf

        <!-- Product Name -->
        <div>
            <label style="font-weight: bold;">Product Name</label>
            <input type="text"
                   name="product_name"
                   required
                   style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <!-- Stock -->
        <div>
            <label style="font-weight: bold;">Stock Quantity</label>
            <input type="number"
                   name="stock_quantity"
                   required
                   style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <!-- Price -->
        <div>
            <label style="font-weight: bold;">Price</label>
            <input type="number"
                   step="0.01"
                   name="price"
                   required
                   style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <button type="submit"
                style="padding: 12px; background: green; color: white; border: none; border-radius: 6px;">
            Save Product
        </button>

    </form>

</div>
@endsection