@extends('layouts.app')

@section('content')
<div>
    <h2>Your Notifications</h2>
    <ul>
        @foreach($notifications as $notification)
            <li class="{{ $notification->is_read ? 'read' : 'unread' }}">
                {{ $notification->message }}
                <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                    @csrf
                    <button type="submit">Mark as Read</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
