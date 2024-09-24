<?php

namespace App\Http\Controllers;

use App\Models\notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function index()
    {
        $notifications = notifications::where('user_id', auth()->id())->get();
        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = notifications::findOrFail($id);
        $notification->update(['is_read' => true]);
        return redirect()->back()->with('success', 'Notification marked as read.');
    }

    public function store()
    {
        // Retrieve the authenticated user's ID using the 'web' guard
        $userId = Auth::guard('web')->id();

        // Notify the user
        notifications::create([
            'user_id' => $userId,
            'message' => 'A new order has been created successfully.'
        ]);

        return response()->json(['message' => 'Notification created successfully']);
    }
}
