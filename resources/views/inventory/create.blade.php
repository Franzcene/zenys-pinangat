@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Material</h1>

    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Material Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" name="quantity" required min="0">
        </div>
        <div class="mb-3">
            <label for="minimum_stock" class="form-label">Minimum Stock</label>
            <input type="number" class="form-control" name="minimum_stock" required min="0">
        </div>
        <div class="mb-3">
            <label for="unit" class="form-label">Unit</label>
            <input type="text" class="form-control" name="unit">
        </div>
        <button type="submit" class="btn btn-primary">Add Material</button>
    </form>
</div>
@endsection
