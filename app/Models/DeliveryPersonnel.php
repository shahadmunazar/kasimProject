<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryPersonnel extends Model
{
    protected $table = 'delivery_personnel';

    protected $fillable = [
        'user_id',
        'employee_code',
        'vehicle_type',
        'vehicle_number',
        'license_number',
        'emergency_contact',
        'is_available',
        'current_latitude',
        'current_longitude',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'is_available' => 'boolean',
            'current_latitude' => 'decimal:7',
            'current_longitude' => 'decimal:7',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function activeShipments()
    {
        return $this->shipments()->whereIn('status', ['shipped', 'in_transit', 'out_for_delivery']);
    }
}
