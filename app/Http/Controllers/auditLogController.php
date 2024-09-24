<?php

namespace App\Http\Controllers;

use App\Models\auditLog;
use App\Models\notifications;
use App\Models\orders;
use Illuminate\Http\Request;

class auditLogController extends Controller
{
    public function index()
    {
        $logs = auditLog::with('user')->get();
        return view('audit_logs.index', compact('logs'));
    }

    public function logAction($action, $description)
    {
        auditLog::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'description' => $description,
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'products' => 'required|array',
    ]);

    // Create the order
    $order = orders::create([
        'customer_id' => $request->customer_id,
        // Assuming you handle products in a separate way
    ]);

    // Log the action using the created order's ID
    (new AuditLogController)->logAction('Create Order', 'Order created with ID: ' . $order->id);

    // Notify the user
    notifications::create([
        'user_id' => auth()->id(),
        'message' => 'A new order has been created successfully.',
    ]);

    return redirect()->route('orders.index')->with('success', 'Order created successfully.');
}

}
