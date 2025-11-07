<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'order_id',
        'ticket_number',
        'status',
        'subject',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function setTicketNumberAttribute()
    {
        $this->attributes['ticket_number'] = $this->generateTicketNumber();
    }

    private function generateTicketNumber(): string
    {
        return 'TICKET' . date('Ymd') . str_pad(time(), 4, '0', STR_PAD_LEFT);
    }

    protected function casts(): array
    {
        return [
            'status' => \App\Enums\TicketStatus::class,
        ];
    }
}
