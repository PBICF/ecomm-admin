<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackOrder extends Model
{
    protected $fillable = [
        'order_id',
        'tracking_number',
        'carrier',
        'status',
        'notes',
        'shipped_at',
        'delivered_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    protected function casts(): array
    {
        return [
            'status' => \App\Enums\OrderStatus::class,
            'shipped_at' => 'datetime:d-m-Y H:i:s',
            'delivered_at' => 'datetime:d-m-Y H:i:s',
        ];
    }
}
