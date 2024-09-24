@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Product Image: {{ $product->name }}</h2>

    <form action="{{ route('products.image.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Image</button>
    </form>
</div>
@endsection
