@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Transaction History for {{ $customer->name }}</h1>

    @if ($customer->orders->isEmpty())
        <p>No transactions found for this customer.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer->orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->amount }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to Customers</a>
</div>
@endsection
