<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();

        $totalRevenue = Order::sum('total_amount');

        $totalCustomers = Customer::count();

        $recentOrders = Order::with('customer')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalRevenue',
            'totalCustomers',
            'recentOrders'
        ));
    }
}
