<?php

namespace App\Filament\Resources\Tickets\Schemas;

use App\Enums\TicketStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('order_id')
                    ->required()
                    ->numeric(),
                TextInput::make('ticket_number')
                    ->required(),
                Select::make('status')
                    ->options(TicketStatus::class)
                    ->default('open')
                    ->required(),
                TextInput::make('subject')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
