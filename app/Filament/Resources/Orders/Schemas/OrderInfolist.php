<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->numeric(),
                TextEntry::make('coupon.name')
                    ->numeric(),
                TextEntry::make('address.name')
                    ->numeric(),
                TextEntry::make('order_number'),
                TextEntry::make('currency'),
                TextEntry::make('status'),
                TextEntry::make('subtotal')
                    ->numeric(),
                TextEntry::make('discount')
                    ->numeric(),
                TextEntry::make('tax')
                    ->numeric(),
                TextEntry::make('shipping_cost')
                    ->numeric(),
                TextEntry::make('total')
                    ->numeric(),
                TextEntry::make('coupon_code'),
                TextEntry::make('coupon_value')
                    ->numeric(),
                TextEntry::make('tracking_number'),
                TextEntry::make('carrier'),
                TextEntry::make('shipped_at')
                    ->dateTime(),
                TextEntry::make('delivered_at')
                    ->dateTime(),
                TextEntry::make('ordered_at')
                    ->dateTime(),
                TextEntry::make('cancelled_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                TextEntry::make('deleted_at')
                    ->dateTime(),
            ]);
    }
}
