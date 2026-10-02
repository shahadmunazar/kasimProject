<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurposeDayLocation extends Model
{
    protected $fillable = ['latitude', 'longitude', 'address'];
}
