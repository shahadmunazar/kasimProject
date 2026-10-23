<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryAttempt extends Model
{
    protected $fillable = [
        'shipment_id',
        'attempted_by',
        'attempt_number',
        'status',
        'failure_reason',
        'rescheduled_date',
        'recipient_name',
        'proof_photo',
        'notes',
        'attempted_at',
    ];

    protected function casts(): array
    {
        return [
            'attempt_number' => 'integer',
            'rescheduled_date' => 'date',
            'attempted_at' => 'datetime',
        ];
    }

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    public function attemptedBy()
    {
        return $this->belongsTo(User::class, 'attempted_by');
    }
}
