@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Order</h2>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_id">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control" required>
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="products">Products</label>
            <select name="products[]" id="products" class="form-control" multiple required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="shipping_information">Shipping Information</label>
            <input type="text" name="shipping_information" class="form-control" id="shipping_information">
        </div>

        <button type="submit" class="btn btn-primary">Create Order</button>
    </form>
</div>
@endsection
