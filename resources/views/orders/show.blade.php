<!-- resources/views/orders/show.blade.php -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>Product</th>
            <th>Original Price</th>
            <th>Discount</th>
            <th>Final Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
        @php
            // Calculate the final price after discount
            $discount = $item->product->discount ?? 0;
            $originalPrice = $item->product->price;
            $finalPrice = $originalPrice - $discount;
        @endphp
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>₱{{ number_format($originalPrice, 2) }}</td>
            <td>₱{{ number_format($discount, 2) }}</td>
            <td>₱{{ number_format($finalPrice, 2) }}</td>
            <td>{{ $item->quantity }}</td>
            <td>₱{{ number_format($finalPrice * $item->quantity, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="5" class="text-right">Grand Total</th>
            <th>₱{{ number_format($order->calculateTotal(), 2) }}</th>
        </tr>
    </tfoot>
</table>
