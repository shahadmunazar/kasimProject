<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'product_model_id', 'name', 'slug', 'image', 'images', 'description', 'price', 'offer_price', 'delivery_charge', 'is_active', 'meta_title', 'meta_description'];

    protected function casts(): array
    {
        return [
            'images' => 'array',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productModel()
    {
        return $this->belongsTo(ProductModel::class, 'product_model_id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }
}
