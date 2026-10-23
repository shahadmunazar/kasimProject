<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentEvent extends Model
{
    protected $fillable = [
        'shipment_id',
        'status',
        'location',
        'description',
        'source',
        'event_timestamp',
        'metadata',
    ];

    protected function casts(): array
    {
        return [
            'event_timestamp' => 'datetime',
            'metadata' => 'array',
        ];
    }

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
