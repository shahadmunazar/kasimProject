<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = ['product_id', 'name', 'email', 'rating', 'comment', 'is_approved', 'ip_address', 'session_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
