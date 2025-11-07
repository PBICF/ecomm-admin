<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'link_url',
        'is_active',
        'show_on',
        'show_until',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'show_on' => 'datetime',
            'show_until' => 'datetime',
        ];
    }
}
