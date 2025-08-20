<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EmployeeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('employee_id'),
                TextEntry::make('first_name'),
                TextEntry::make('last_name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('phone'),
                TextEntry::make('date_of_birth')
                    ->date(),
                TextEntry::make('gender'),
                TextEntry::make('city'),
                TextEntry::make('state'),
                TextEntry::make('postal_code'),
                TextEntry::make('country'),
                TextEntry::make('department.name'),
                TextEntry::make('position.title'),
                TextEntry::make('join_date')
                    ->date(),
                TextEntry::make('contract_end_date')
                    ->date(),
                TextEntry::make('employment_status'),
                TextEntry::make('basic_salary')
                    ->numeric(),
                TextEntry::make('house_rent_allowance')
                    ->numeric(),
                TextEntry::make('dearness_allowance')
                    ->numeric(),
                TextEntry::make('transport_allowance')
                    ->numeric(),
                TextEntry::make('medical_allowance')
                    ->numeric(),
                TextEntry::make('other_allowances')
                    ->numeric(),
                TextEntry::make('bank_name'),
                TextEntry::make('account_number'),
                TextEntry::make('ifsc_code'),
                TextEntry::make('emergency_contact_name'),
                TextEntry::make('emergency_contact_phone'),
                TextEntry::make('emergency_contact_relationship'),
                TextEntry::make('profile_photo'),
                TextEntry::make('id_proof'),
                TextEntry::make('resume'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
