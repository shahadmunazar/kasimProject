<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'is_active', 'meta_title', 'meta_description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function productModels()
    {
        return $this->hasMany(ProductModel::class);
    }
}
