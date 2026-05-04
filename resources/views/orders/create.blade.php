@extends('layouts.app')

@section('title', 'Create Order')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="text-2xl font-bold mb-6 text-gray-800">Create Order</h1>

    @if(!auth()->user()->customer)
        <div class="mb-4 p-3 bg-red-100 text-red-600 rounded-lg">
            You must create a customer profile first before placing an order.
        </div>
    @endif

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        <div class="space-y-3">

            @foreach($products as $product)
            <div class="bg-white p-4 rounded-2xl shadow flex justify-between items-center">

                <div class="flex items-center gap-3">

                    <input type="checkbox"
                           name="product_ids[]"
                           value="{{ $product->id }}"
                           onchange="toggleQty(this)"
                           class="w-4 h-4">

                    <div>
                        <p class="font-semibold text-gray-800">
                            {{ $product->product_name }}
                        </p>

                        <p class="text-sm text-gray-500">
                            ₱{{ number_format($product->price, 2) }}
                        </p>
                    </div>

                </div>

                <input type="number"
                       name="quantities[{{ $product->id }}]"
                       value="1"
                       min="1"
                       disabled
                       class="w-20 p-1 border rounded-lg text-center">

            </div>
            @endforeach

        </div>

        <button type="submit"
                class="mt-6 w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition">
            Create Order
        </button>

    </form>

</div>

<!-- SCRIPT -->
<script>
function toggleQty(checkbox) {
    const card = checkbox.closest('.bg-white');
    const qty = card.querySelector('input[type="number"]');

    qty.disabled = !checkbox.checked;

    if (!checkbox.checked) {
        qty.value = 1;
    }
}
</script>

@endsection
