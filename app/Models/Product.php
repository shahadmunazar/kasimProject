<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'product_model_id',
        'name',
        'slug',
        'sku',
        'barcode',
        'image',
        'images',
        'description',
        'price',
        'offer_price',
        'cost_price',
        'delivery_charge',
        'stock_quantity',
        'low_stock_threshold',
        'track_inventory',
        'stock_status',
        'is_active',
        'meta_title',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'images' => 'array',
            'track_inventory' => 'boolean',
            'is_active' => 'boolean',
            'stock_quantity' => 'integer',
            'low_stock_threshold' => 'integer',
            'price' => 'decimal:2',
            'offer_price' => 'decimal:2',
            'cost_price' => 'decimal:2',
            'delivery_charge' => 'decimal:2',
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

    public function warehouseStocks()
    {
        return $this->hasMany(WarehouseStock::class);
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class)->latest();
    }

    public function stockReservations()
    {
        return $this->hasMany(StockReservation::class);
    }

    public function purchaseOrderItems()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    public function shipmentItems()
    {
        return $this->hasMany(ShipmentItem::class);
    }

    public function isLowStock(?int $threshold = null): bool
    {
        $limit = $threshold ?? max((int)($this->low_stock_threshold ?: 5), 10);
        $avail = $this->availableStock();
        return $this->track_inventory && $avail <= $limit && $avail > 0;
    }

    public function isOutOfStock(): bool
    {
        return $this->track_inventory && $this->availableStock() <= 0;
    }

    public function availableStock(): int
    {
        if (!$this->track_inventory) {
            return 999999;
        }

        $activeReservations = $this->stockReservations()
            ->where('status', 'reserved')
            ->where('expires_at', '>', now())
            ->sum('quantity');

        return max(0, (int)$this->stock_quantity - (int)$activeReservations);
    }

    public function effectivePrice(): float
    {
        if ($this->offer_price && (float)$this->offer_price > 0) {
            return (float)$this->offer_price;
        }
        return (float)($this->price ?? 0);
    }

    public function imageUrl(?string $path = null): string
    {
        $target = $path ?: (($this->images && count($this->images) > 0) ? $this->images[0] : $this->image);
        if (!$target && $this->slug === 'industrial-iot-monitoring-product') {
            return asset('assets/img/products/industrial-iot-monitoring-product.jpg');
        }
        if (!$target) {
            return asset('favicon.png');
        }
        if (str_starts_with($target, 'http://') || str_starts_with($target, 'https://')) {
            return $target;
        }
        if (str_starts_with($target, 'assets/')) {
            return asset($target);
        }
        if (str_starts_with($target, 'storage/')) {
            return asset($target);
        }
        return asset('storage/' . ltrim($target, '/'));
    }

    public function imageGallery(): array
    {
        $list = [];
        if (!empty($this->images) && is_array($this->images)) {
            $list = $this->images;
        } elseif (!empty($this->image)) {
            $list = [$this->image];
        }

        if (empty($list) && $this->slug === 'industrial-iot-monitoring-product') {
            $list = ['assets/img/products/industrial-iot-monitoring-product.jpg'];
        }

        if (empty($list)) {
            return [];
        }

        return array_map(function ($img) {
            return $this->imageUrl($img);
        }, $list);
    }
}

