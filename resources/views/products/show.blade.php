@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
            <p><strong>Price:</strong> ₱{{ number_format($product->price, 2) }}</p>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
        </div>
    </div>
</div>
@endsection
