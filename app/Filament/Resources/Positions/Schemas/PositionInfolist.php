<?php

namespace App\Filament\Resources\Positions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PositionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('salary_grade'),
                TextEntry::make('min_salary')
                    ->numeric(),
                TextEntry::make('max_salary')
                    ->numeric(),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
