@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: auto;">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Orders List</h2>

        <a href="{{ route('orders.create') }}"
           style="
                background: green;
                color: white;
                padding: 10px 15px;
                border-radius: 6px;
                text-decoration: none;
           ">
            + Create Order
        </a>
    </div>

    @if($orders->isEmpty())
        <p>No orders yet. Create one first.</p>
    @else

        <div style="display: flex; flex-direction: column; gap: 12px;">

            @foreach($orders as $order)
                <div style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 15px;
                    border: 1px solid #ddd;
                    border-radius: 10px;
                    background: #fff;
                ">

                    <!-- ORDER INFO -->
                    <div>
                        <div style="font-weight: bold;">
                            Order #{{ $order->id }}
                        </div>

                        <div style="font-size: 13px; color: gray;">
                            {{ $order->customer->name }}
                        </div>

                        <div style="font-size: 13px; color: gray;">
                            {{ $order->order_date }}
                        </div>

                        <div style="margin-top: 5px; font-weight: bold; color: green;">
                            ₱{{ number_format($order->total_amount, 2) }}
                        </div>
                    </div>

                    <!-- ACTIONS -->
                    <div style="display: flex; gap: 10px; align-items: center;">

                        <a href="{{ route('orders.show', $order->id) }}"
                           style="color: #2563eb; text-decoration: none;">
                            View
                        </a>

                        {{-- DELETE BUTTON (POLICY-BASED) --}}
                        @can('delete', $order)
                            <form method="POST"
                                  action="{{ route('orders.destroy', $order->id) }}"
                                  onsubmit="return confirm('Delete this order?')">

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
                        @endcan

                    </div>

                </div>
            @endforeach

        </div>

    @endif

</div>
@endsection