@extends('layouts.app')

@section('title', 'Orders List')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold text-gray-800">Orders List</h1>

        <a href="{{ route('orders.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
            + Create Order
        </a>

    </div>

    @if($orders->isEmpty())

        <div class="bg-white p-6 rounded-2xl shadow text-center text-gray-500">
            No orders yet. Create your first order.
        </div>

    @else

        <div class="space-y-4">

            @foreach($orders as $order)

            <div class="bg-white p-5 rounded-2xl shadow flex justify-between items-center">

                <div>

                    <p class="font-semibold text-gray-800">
                        Order #{{ $order->id }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ $order->customer->name }}
                    </p>

                    <p class="text-xs text-gray-400">
                        {{ $order->order_date }}
                    </p>

                    <p class="mt-1 font-bold text-green-600">
                        ₱{{ number_format($order->total_amount, 2) }}
                    </p>

                </div>

                <div class="flex items-center gap-4">

                    <a href="{{ route('orders.show', $order->id) }}"
                       class="text-blue-600 hover:underline">
                        View
                    </a>

                    @can('delete', $order)
                    <form method="POST"
                          action="{{ route('orders.destroy', $order->id) }}"
                          onsubmit="return confirm('Delete this order?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="text-red-600 hover:underline">
                            Delete
                        </button>

                    </form>
                    @endcan

                </div>

            </div>

            @endforeach

        </div>

    @endif

</div>

@endsection
