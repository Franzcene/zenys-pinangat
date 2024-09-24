<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\orders;
use App\Models\products;
use App\Models\customers;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index(Request $request)
    {
        // Fetch orders, can be filtered by status
        $status = $request->input('status');
        $orders = orders::when($status, function ($query, $status) {
            return $query->where('status', $status);
        })->get();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = products::all();
        $customers = customers::all();
        
        return view('orders.create', compact('products', 'customers'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'products' => 'required|array',
            'products.*' => 'exists:products,id', // Ensure all product IDs are valid
            'shipping_information' => 'nullable|string|max:255',
        ]);

        // Create the order
        $order = orders::create([
            'customer_id' => $request->customer_id,
            'products' => json_encode($request->products), // Store product IDs as JSON
            'shipping_information' => $request->shipping_information,
            'status' => 'pending', // Default status
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show(orders $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(orders $order)
    {
        $products = products::all();
        $customers = customers::all();

        return view('orders.edit', compact('order', 'products', 'customers'));
    }

    public function update(Request $request, orders $order)
    {
        // Validate request
        $request->validate([
            'status' => 'required|in:pending,in_progress,shipped,delivered',
        ]);

        // Update the order status
        $order->update(['status' => $request->status]);

        return redirect()->route('orders.index')->with('success', 'Order status updated successfully.');
    }

    public function destroy(orders $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
