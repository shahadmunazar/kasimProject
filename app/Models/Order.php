<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'is_confirmed' => 'boolean',
            'amount' => 'decimal:2',
            'delivery_charge' => 'decimal:2',
            'base_delivery_charge' => 'decimal:2',
            'per_km_rate' => 'decimal:2',
            'payment_amount' => 'decimal:2',
            'payment_date' => 'date',
            'expected_delivery_date' => 'date',
            'shipped_at' => 'datetime',
            'invoice_date' => 'datetime',
            'cancelled_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userAddress()
    {
        return $this->belongsTo(UserAddress::class, 'user_address_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function latestShipment()
    {
        return $this->hasOne(Shipment::class)->latestOfMany();
    }

    public function stockReservations()
    {
        return $this->hasMany(StockReservation::class);
    }

    public function isPaid(): bool
    {
        return $this->payment_status === 'paid' || $this->is_confirmed;
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isDelivered(): bool
    {
        return in_array($this->status, ['delivered', 'completed']) ||
               in_array($this->effective_delivery_status, ['delivered', 'completed']);
    }

    public function isCancelled(): bool
    {
        return $this->status === 'cancelled' || $this->status === 'disapproved';
    }

    public function canBeCancelled(): bool
    {
        return in_array($this->status, ['pending', 'approved', 'processing']);
    }

    public function getPublicTrackingUrlAttribute(): string
    {
        return route('tracking.public', ['token' => $this->tracking_token]);
    }

    /**
     * Check if valid manual courier tracking details have been entered
     */
    public function hasShipmentTracking(): bool
    {
        return !empty($this->tracking_id) || ($this->latestShipment && !empty($this->latestShipment->awb_number));
    }

    /**
     * Get effective courier partner name
     */
    public function getEffectiveCourierNameAttribute(): ?string
    {
        if (!empty($this->courier_name)) {
            return $this->courier_name;
        }
        if ($this->latestShipment && !empty($this->latestShipment->courier_name)) {
            return $this->latestShipment->courier_name;
        }
        return null;
    }

    /**
     * Get effective tracking ID / AWB number
     */
    public function getEffectiveTrackingIdAttribute(): ?string
    {
        if (!empty($this->tracking_id)) {
            return $this->tracking_id;
        }
        if ($this->latestShipment && !empty($this->latestShipment->awb_number)) {
            return $this->latestShipment->awb_number;
        }
        return null;
    }

    /**
     * Get effective official tracking URL
     */
    public function getEffectiveTrackingUrlAttribute(): ?string
    {
        if (!empty($this->tracking_url)) {
            return $this->tracking_url;
        }
        if ($this->latestShipment && !empty($this->latestShipment->tracking_url)) {
            return $this->latestShipment->tracking_url;
        }
        // Fallback to building with CourierHelper
        $courier = $this->effective_courier_name;
        $trackingId = $this->effective_tracking_id;
        if ($courier && $trackingId) {
            return \App\Helpers\CourierHelper::buildTrackingUrl($courier, $trackingId);
        }
        return null;
    }

    /**
     * Get effective delivery status
     */
    public function getEffectiveDeliveryStatusAttribute(): string
    {
        if ($this->status === 'delivered' || $this->delivery_status === 'delivered') {
            return 'delivered';
        }
        if (!empty($this->delivery_status) && $this->delivery_status !== 'processing') {
            return $this->delivery_status;
        }
        if ($this->latestShipment && !empty($this->latestShipment->status)) {
            return $this->latestShipment->status;
        }
        if (!empty($this->delivery_status)) {
            return $this->delivery_status;
        }
        if ($this->status === 'dispatched') {
            return 'shipped';
        }
        return 'processing';
    }

    /**
     * Get effective shipment date
     */
    public function getEffectiveShippedAtAttribute(): ?\Carbon\Carbon
    {
        if ($this->shipped_at) {
            return $this->shipped_at;
        }
        if ($this->latestShipment && $this->latestShipment->shipped_at) {
            return $this->latestShipment->shipped_at;
        }
        return null;
    }

    /**
     * Get delivery status human label
     */
    public function getDeliveryStatusLabelAttribute(): string
    {
        return \App\Helpers\CourierHelper::getStatusLabel($this->effective_delivery_status);
    }

    /**
     * Get delivery status CSS badge class
     */
    public function getDeliveryStatusBadgeAttribute(): string
    {
        return \App\Helpers\CourierHelper::getStatusBadge($this->effective_delivery_status);
    }

    /**
     * Check if invoice can be printed/downloaded
     */
    public function canPrintInvoice(): bool
    {
        return $this->isDelivered() || 
               in_array($this->status, ['approved', 'dispatched', 'completed', 'delivered']) ||
               in_array($this->effective_delivery_status, ['shipped', 'in_transit', 'out_for_delivery', 'delivered']);
    }

    /**
     * Get effective invoice number
     */
    public function getEffectiveInvoiceNumberAttribute(): string
    {
        if (!empty($this->invoice_number)) {
            return $this->invoice_number;
        }
        $prefix = \App\Models\Setting::where('key', 'invoice_prefix')->value('value') ?: 'INV-';
        return $prefix . ($this->order_number ?: str_pad($this->id, 6, '0', STR_PAD_LEFT));
    }

    /**
     * Get effective invoice date
     */
    public function getEffectiveInvoiceDateAttribute(): \Carbon\Carbon
    {
        if ($this->invoice_date) {
            return $this->invoice_date;
        }
        if ($this->isDelivered() && $this->updated_at) {
            return $this->updated_at;
        }
        return $this->shipped_at ?: ($this->created_at ?: now());
    }
}

