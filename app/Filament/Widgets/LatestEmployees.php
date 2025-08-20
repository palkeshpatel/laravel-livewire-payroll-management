<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestEmployees extends BaseWidget
{
    protected static ?string $heading = 'Latest Employees';

    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Employee::query()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('employee_id')
                    ->label('Employee ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('department.name')
                    ->label('Department')
                    ->sortable(),
                Tables\Columns\TextColumn::make('position.title')
                    ->label('Position')
                    ->sortable(),
                Tables\Columns\TextColumn::make('join_date')
                    ->label('Join Date')
                    ->date()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('employment_status')
                    ->label('Status')
                    ->colors([
                        'success' => 'active',
                        'danger' => 'inactive',
                        'warning' => 'terminated',
                    ]),
            ])
            ->actions([]);
    }
}
