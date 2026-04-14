<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customer = Auth::user()?->customer;

        if (!$customer) {
            abort(403, 'No customer profile linked to this user.');
        }

        $orders = Order::with(['customer', 'products'])
            ->where('customer_id', $customer->id)
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customer = Auth::user()?->customer;

        if (!$customer) {
            abort(403, 'Create customer profile first.');
        }

        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $customer = Auth::user()?->customer;

        if (!$customer) {
            abort(403, 'Create customer profile first.');
        }

        $request->validate([
            'product_ids' => 'required|array|min:1',
            'product_ids.*' => 'exists:products,id',
            'quantities' => 'required|array',
        ]);

        $order = Order::create([
            'customer_id' => $customer->id,
            'order_date' => now(),
            'total_amount' => 0,
        ]);

        $total = 0;

        foreach ($request->product_ids as $productId) {
            $product = Product::findOrFail($productId);

            $qty = $request->quantities[$productId] ?? 1;

            $order->products()->attach($productId, [
                'quantity' => $qty,
            ]);

            $total += ($product->price * $qty);
        }

        $order->update(['total_amount' => $total]);

        return redirect()->route('orders.index')->with('success', 'Order created.');
    }

    public function show(Order $order)
    {
        $customer = Auth::user()?->customer;

        if (!$customer || $order->customer_id !== $customer->id) {
            abort(403);
        }

        $order->load(['customer', 'products']);

        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $customer = Auth::user()?->customer;

        if (!$customer || $order->customer_id !== $customer->id) {
            abort(403);
        }

        $products = Product::all();

        return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $customer = Auth::user()?->customer;

        if (!$customer || $order->customer_id !== $customer->id) {
            abort(403);
        }

        $request->validate([
            'product_ids' => 'required|array',
        ]);

        $order->products()->sync($request->product_ids);

        $newTotal = $order->products->sum('price');
        $order->update(['total_amount' => $newTotal]);

        return redirect()->route('orders.index')->with('success', 'Order updated.');
    }

    public function destroy(Order $order)
    {
        $customer = Auth::user()?->customer;

        if (!$customer || $order->customer_id !== $customer->id) {
            abort(403);
        }

        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted.');
    }
}