@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Product List</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add New Product</a> <!-- Added margin-bottom for spacing -->
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Stock Status</th> <!-- Changed header for clarity -->
                <th>Discount</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>₱{{ number_format($product->price, 2) }}</td>
                    <td>
                        @if($product->stock > 0)
                            <span class="text-success">Available</span>
                        @else
                            <span class="text-danger">Out of Stock</span>
                        @endif
                    </td>
                    <td>
                        @if($product->discount > 0)
                            {{ $product->discount }}%
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" width="50" class="img-thumbnail"> <!-- Added class for styling -->
                        @else
                            N/A <!-- Added fallback if no image -->
                        @endif
                    </td>
                    <td>
                        <!-- Grouped the action buttons together -->
                        <div class="btn-group" role="group" aria-label="Product Actions">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('products.image.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit Image</a>
                            @if($product->stock > 0)
                                <a href="{{ route('products.stock.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit Stock</a>
                            @endif
                            @if($product->discount > 0)
                                <a href="{{ route('products.discount.edit', $product->id) }}" class="btn btn-sm btn-info">Edit Discount</a>
                            @endif
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button> <!-- Changed to btn-sm for consistency -->
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
