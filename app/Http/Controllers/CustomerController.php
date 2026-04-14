<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Auth::user()->customer;

        return view('customers.index', compact('customer'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Customer::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
        ]);

        return redirect()->route('customers.index')
            ->with('success', 'Profile created.');
    }

    public function show()
    {
        $customer = Auth::user()->customer;
        return view('customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Auth::user()->customer;

        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Auth::user()->customer;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $customer->update($validated);

        return redirect()->route('customers.index')
            ->with('success', 'Updated.');
    }

    public function destroy($id)
    {
        $customer = Auth::user()->customer;
        $customer->delete();

        return redirect('/');
    }
}