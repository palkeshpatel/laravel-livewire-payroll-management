<?php

namespace App\Filament\Resources\Employees\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('employee_id')
                    ->searchable(),
                TextColumn::make('first_name')
                    ->searchable(),
                TextColumn::make('last_name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('date_of_birth')
                    ->date()
                    ->sortable(),
                TextColumn::make('gender'),
                TextColumn::make('city')
                    ->searchable(),
                TextColumn::make('state')
                    ->searchable(),
                TextColumn::make('postal_code')
                    ->searchable(),
                TextColumn::make('country')
                    ->searchable(),
                TextColumn::make('department.name')
                    ->searchable(),
                TextColumn::make('position.title')
                    ->searchable(),
                TextColumn::make('join_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('contract_end_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('employment_status'),
                TextColumn::make('basic_salary')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('house_rent_allowance')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('dearness_allowance')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('transport_allowance')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('medical_allowance')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('other_allowances')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('bank_name')
                    ->searchable(),
                TextColumn::make('account_number')
                    ->searchable(),
                TextColumn::make('ifsc_code')
                    ->searchable(),
                TextColumn::make('emergency_contact_name')
                    ->searchable(),
                TextColumn::make('emergency_contact_phone')
                    ->searchable(),
                TextColumn::make('emergency_contact_relationship')
                    ->searchable(),
                TextColumn::make('profile_photo')
                    ->searchable(),
                TextColumn::make('id_proof')
                    ->searchable(),
                TextColumn::make('resume')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
