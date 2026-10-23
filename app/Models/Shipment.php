<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'shipment_number',
        'order_id',
        'warehouse_id',
        'delivery_type',
        'delivery_personnel_id',
        'courier_code',
        'courier_name',
        'awb_number',
        'tracking_number',
        'tracking_url',
        'label_url',
        'status',
        'pickup_scheduled_at',
        'shipped_at',
        'delivered_at',
        'estimated_delivery_date',
        'recipient_name',
        'proof_signature',
        'proof_photo',
        'delivery_notes',
    ];

    protected function casts(): array
    {
        return [
            'pickup_scheduled_at' => 'datetime',
            'shipped_at' => 'datetime',
            'delivered_at' => 'datetime',
            'estimated_delivery_date' => 'date',
        ];
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function deliveryPersonnel()
    {
        return $this->belongsTo(DeliveryPersonnel::class);
    }

    public function items()
    {
        return $this->hasMany(ShipmentItem::class);
    }

    public function events()
    {
        return $this->hasMany(ShipmentEvent::class)->orderBy('event_timestamp', 'desc');
    }

    public function attempts()
    {
        return $this->hasMany(DeliveryAttempt::class)->orderBy('attempt_number', 'asc');
    }

    public function isDelivered(): bool
    {
        return $this->status === 'delivered';
    }

    public function isManual(): bool
    {
        return $this->delivery_type === 'manual';
    }
}
