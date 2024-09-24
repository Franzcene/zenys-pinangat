@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Customer</h1>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $customer->name }}" required>
        </div>
        <div  class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $customer->email }}" required>
        </div>
        <div class="mb-3">
            <label for="contacts" class="form-label">Contacts</label>
            <input type="text" class="form-control" name="contacts" id="contacts" value="{{ $customer->contacts }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" name="address" id="address" required>{{ $customer->address }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Customer</button>
    </form>
</div>
@endsection
