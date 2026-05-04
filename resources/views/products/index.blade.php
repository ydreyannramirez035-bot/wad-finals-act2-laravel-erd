@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: auto;">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Products</h2>

        <a href="{{ route('products.create') }}"
           style="
                background: green;
                color: white;
                padding: 10px 15px;
                border-radius: 6px;
                text-decoration: none;
           ">
            + Add Product
        </a>
    </div>

    <div style="display: flex; flex-direction: column; gap: 12px;">

        @foreach($products as $product)
            <div style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px;
                border: 1px solid #ddd;
                border-radius: 10px;
                background: #fff;
            ">

                <!-- Product Info -->
                <div>
                    <div style="font-weight: bold; font-size: 16px;">
                        {{ $product->product_name }}
                    </div>

                    <div style="font-size: 13px; color: gray;">
                        Stock: {{ $product->stock_quantity }}
                    </div>

                    <div style="margin-top: 5px; font-weight: bold; color: #333;">
                        ₱{{ number_format($product->price, 2) }}
                    </div>
                </div>

                <!-- Actions -->
                <div style="display: flex; gap: 10px; align-items: center;">

                    <a href="{{ route('products.show', $product->id) }}"
                       style="color: #2563eb; text-decoration: none;">
                        View
                    </a>

                    <a href="{{ route('products.edit', $product->id) }}"
                       style="color: #f59e0b; text-decoration: none;">
                        Edit
                    </a>

                    <form method="POST"
                          action="{{ route('products.destroy', $product->id) }}"
                          onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                style="
                                    background: red;
                                    color: white;
                                    border: none;
                                    padding: 6px 10px;
                                    border-radius: 6px;
                                    cursor: pointer;
                                ">
                            Delete
                        </button>
                    </form>

                </div>

            </div>
        @endforeach

    </div>

</div>
@endsection