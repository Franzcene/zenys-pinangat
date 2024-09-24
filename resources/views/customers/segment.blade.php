@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Loyal Customers</h1>

    @if ($loyalCustomers->isEmpty())
        <p>No loyal customers found.</p>
    @else
        <ul class="list-group">
            @foreach ($loyalCustomers as $customer)
                <li class="list-group-item">
                    {{ $customer->name }} - {{ $customer->contacts }} - {{ $customer->address }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
