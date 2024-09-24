<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'product_id', 'quantity', 'status', 'total_amount', 'status'];
    
    public function customers()
    {
        return $this->belongsTo(customers::class);
    }

    public function products()
    {
        return $this->belongsTo(products::class);
    }

    public function calculateTotal()
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->product->final_price * $item->quantity;
        }

        return $total;
    }
}
