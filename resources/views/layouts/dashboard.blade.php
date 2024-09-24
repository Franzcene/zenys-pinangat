@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">Products Management</a>
                <a href="{{ route('customers.index') }}" class="list-group-item list-group-item-action">Customer Management</a>
                <a href="{{ route('inventory.index') }}" class="list-group-item list-group-item-action">Inventory Management</a>
                <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action">Order Management</a>
                <a href="{{ route('transactions.index') }}" class="list-group-item list-group-item-action">Transaction Management</a>
                <a href="{{ route('accounting.index') }}" class="list-group-item list-group-item-action">Accounting & Finance</a>
                <a href="{{ route('help') }}" class="list-group-item list-group-item-action">Help</a>
                <a href="{{ route('faqs') }}" class="list-group-item list-group-item-action">FAQs</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <h1>Zeny’s Pinangat</h1>
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-center mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders</h5>
                            <p class="card-text">{{ $totalOrders }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Inventory</h5>
                            <p class="card-text">{{ $totalInventory }} items</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Sales</h5>
                            <p class="card-text">₱{{ number_format($totalSales, 2) }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Recent Activities</h5>
                            <ul class="list-unstyled">
                                @foreach($recentActivities as $activity)
                                    <li>{{ $activity }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Sales Chart</h5>
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May'],
            datasets: [{
                label: 'Sales',
                data: [12, 19, 3, 5, 2], // Replace with dynamic data from your sales records
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
