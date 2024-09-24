@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Order List</h2>

    <form method="GET" action="{{ route('orders.index') }}">
        <label for="status">Filter by status:</label>
        <select name="status" id="status" onchange="this.form.submit()">
            <option value="">All</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped</option>
            <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
        </select>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Products</th>
                <th>Status</th>
                <th>Shipping Info</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $orders->customer->name }}</td>
                    <td>{{ implode(', ', json_decode($order->products)) }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ $order->shipping_information }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
