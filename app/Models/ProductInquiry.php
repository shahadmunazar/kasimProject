<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductInquiry extends Model
{
    protected $fillable = [
        'product_id',
        'name',
        'email',
        'phone',
        'message',
        'terms_accepted_at',
        'terms_accepted_ip',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
