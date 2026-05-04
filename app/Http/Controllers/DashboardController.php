<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // ONLY CUSTOMER DATA HERE
        $ordersQuery = Order::whereHas('customer', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        });

        $totalOrders = $ordersQuery->count();

        $totalSpent = $ordersQuery->sum('total_amount');

        $recentOrders = $ordersQuery
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalOrders',
            'totalSpent',
            'recentOrders'
        ));
    }
}
