<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'user_id',
        'session_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getSubtotalAttribute()
    {
        $unitPrice = $this->price ?? $this->product->offer_price ?? $this->product->price ?? 0;
        return $unitPrice * $this->quantity;
    }
}
