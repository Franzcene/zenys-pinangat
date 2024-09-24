<?php

namespace App\Http\Controllers;

use App\Models\customers;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function index()
    {
        $customers = customers::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'emial'=> 'required|string',
            'contact' => 'required',
            'address' => 'required',
        ]);

        customers::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
    }

    public function edit($id)
    {
        $customer = customers::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'contact' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $customer = customers::findOrFail($id);
        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        $customer = customers::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }

    public function show($id)
    {
        $customer = customers::findOrFail($id);
        // Load related transactions or other relevant data here
        return view('customers.show', compact('customer'));
    }

    public function segment()
    {
    $loyalCustomers = customers::with('orders')->whereHas('orders', function($query) {
        $query->havingRaw('COUNT(*) > ?', [5]); // Loyal if more than 5 orders
    })->get();

    return view('customers.segment', compact('loyalCustomers'));
    }

    public function transactions($id)
    {
    $customer = customers::with('orders')->findOrFail($id);
    return view('customers.transactions', compact('customer'));
    }

}
