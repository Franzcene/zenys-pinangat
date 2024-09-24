@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Stock for: {{ $product->name }}</h2>

    <form action="{{ route('products.stock.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Stock</button>
    </form>
</div>
@endsection
