<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <script src="{{ asset('js/all.js') }}"></script>

<body>
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold">Dashboard</h1>

        <div class="grid grid-cols-3 gap-4 mt-4">
            <div class="p-4 border">
                <h2>Total Orders</h2>
                <p>{{ $totalOrders }}</p>
            </div>
            <div class="p-4 border">
                <h2>Total Products</h2>
                <p>{{ $totalProducts }}</p>
            </div>
            <div class="p-4 border">
                <h2>Total Customers</h2>
                <p>{{ $totalCustomers }}</p>
            </div>
        </div>

        <h2 class="mt-5">Recent Orders</h2>
        <table class="min-w-full border-collapse border border-gray-300 mt-3">
            <thead>
                <tr>
                    <th class="border border-gray-300 p-2">Order ID</th>
                    <th class="border border-gray-300 p-2">Customer ID</th>
                    <th class="border border-gray-300 p-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentOrders as $order)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $order->id }}</td>
                        <td class="border border-gray-300 p-2">{{ $order->customer_id }}</td>
                        <td class="border border-gray-300 p-2">{{ $order->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
