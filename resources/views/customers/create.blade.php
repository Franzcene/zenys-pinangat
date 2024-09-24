@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Add Customer</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label for="contacts" class="form-label">Contacts</label>
            <input type="text" class="form-control" name="contacts" id="contacts" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" name="address" id="address" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Customer</button>
    </form>
</div>
@endsection
