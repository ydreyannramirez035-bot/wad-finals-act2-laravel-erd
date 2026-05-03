@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: auto; position: relative; z-index: 1;">

    <h2 style="margin-bottom: 20px;">Create Order</h2>

    @if(!auth()->user()->customer)
        <p style="color:red; margin-bottom: 15px;">
            You must create a customer profile first.
        </p>
    @endif

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        <div style="display: flex; flex-direction: column; gap: 12px;">

            @foreach($products as $product)
                <div style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 12px;
                    border: 1px solid #ddd;
                    border-radius: 8px;
                ">

                    <!-- Product Info -->
                    <div>
                        <label style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" name="product_ids[]" value="{{ $product->id }}">
                            <div>
                                <div style="font-weight: bold;">
                                    {{ $product->product_name }}
                                </div>
                                <div style="font-size: 14px; color: gray;">
                                    ₱{{ number_format($product->price, 2) }}
                                </div>
                            </div>
                        </label>
                    </div>

                    <!-- Quantity -->
                    <div>
                        <input type="number"
                               name="quantities[{{ $product->id }}]"
                               value="1"
                               min="1"
                               style="width: 70px; padding: 5px;">
                    </div>

                </div>
            @endforeach

        </div>

        <button type="submit"
                style="
                    margin-top: 20px;
                    width: 100%;
                    padding: 12px;
                    background: green;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    font-size: 16px;
                ">
            Create Order
        </button>

    </form>

</div>

<style>
* {
    pointer-events: auto !important;
}
</style>
@endsection