@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Customer Details</h1>

    <p><strong>Name:</strong> {{ $customer->name }}</p>
    <p><strong>Email:</strong> {{ $customer->email }}</p>
    <p><strong>Contacts:</strong> {{ $customer->contacts }}</p>
    <p><strong>Address:</strong> {{ $customer->address }}</p>

    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to Customers</a>
</div>
@endsection
