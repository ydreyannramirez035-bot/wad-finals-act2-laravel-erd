@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: auto;">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Edit Product</h2>

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

    <form method="POST"
          action="{{ route('products.update', $product->id) }}"
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
        @method('PUT')

        <!-- Product Name -->
        <div>
            <label style="font-weight: bold;">Product Name</label>
            <input type="text"
                   name="product_name"
                   value="{{ $product->product_name }}"
                   required
                   style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 5px;
                        border: 1px solid #ccc;
                        border-radius: 6px;
                   ">
        </div>

        <!-- Stock -->
        <div>
            <label style="font-weight: bold;">Stock Quantity</label>
            <input type="number"
                   name="stock_quantity"
                   value="{{ $product->stock_quantity }}"
                   required
                   style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 5px;
                        border: 1px solid #ccc;
                        border-radius: 6px;
                   ">
        </div>

        <!-- Price -->
        <div>
            <label style="font-weight: bold;">Price</label>
            <input type="number"
                   step="0.01"
                   name="price"
                   value="{{ $product->price }}"
                   required
                   style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 5px;
                        border: 1px solid #ccc;
                        border-radius: 6px;
                   ">
        </div>

        <!-- Submit -->
        <button type="submit"
                style="
                    margin-top: 10px;
                    padding: 12px;
                    background: orange;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    font-size: 16px;
                    cursor: pointer;
                ">
            Save Changes
        </button>

    </form>

</div>
@endsection