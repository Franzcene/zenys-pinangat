<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'stock_quantity'];

    public function product()
    {
        return $this->belongsTo(products::class);
    }
}
