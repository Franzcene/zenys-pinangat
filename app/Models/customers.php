<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'contact', 'address'];

    // Define the relationship with Order
    public function orders()
    {
        return $this->hasMany(orders::class);
    }

    // Add a method to determine if the customer is loyal
    public function isLoyal()
    {
        return $this->orders()->count() > 5; // Adjust the number as needed
    }
}
