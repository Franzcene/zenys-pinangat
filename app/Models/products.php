<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'quantity', 'price', 'stock', 'discount', 'image'];

     // Add a method to calculate the final price after discount
    public function getFinalPriceAttribute()
    {
        return $this->price - $this->discount;
    }

    // Calculate final price after discount
    public function getDiscountedPrice()
    {
        return $this->price - ($this->price * ($this->discount / 100));
    }
}
