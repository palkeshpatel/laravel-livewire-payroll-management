<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('employee_id')
                    ->required(),
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                DatePicker::make('date_of_birth')
                    ->required(),
                Select::make('gender')
                    ->options(['male' => 'Male', 'female' => 'Female', 'other' => 'Other'])
                    ->required(),
                Textarea::make('address')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('city')
                    ->default(null),
                TextInput::make('state')
                    ->default(null),
                TextInput::make('postal_code')
                    ->default(null),
                TextInput::make('country')
                    ->required()
                    ->default('India'),
                Select::make('department_id')
                    ->relationship('department', 'name')
                    ->required(),
                Select::make('position_id')
                    ->relationship('position', 'title')
                    ->required(),
                DatePicker::make('join_date')
                    ->required(),
                DatePicker::make('contract_end_date'),
                Select::make('employment_status')
                    ->options([
            'active' => 'Active',
            'inactive' => 'Inactive',
            'terminated' => 'Terminated',
            'resigned' => 'Resigned',
        ])
                    ->default('active')
                    ->required(),
                TextInput::make('basic_salary')
                    ->required()
                    ->numeric(),
                TextInput::make('house_rent_allowance')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('dearness_allowance')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('transport_allowance')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('medical_allowance')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('other_allowances')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('bank_name')
                    ->default(null),
                TextInput::make('account_number')
                    ->default(null),
                TextInput::make('ifsc_code')
                    ->default(null),
                TextInput::make('emergency_contact_name')
                    ->default(null),
                TextInput::make('emergency_contact_phone')
                    ->tel()
                    ->default(null),
                TextInput::make('emergency_contact_relationship')
                    ->default(null),
                TextInput::make('profile_photo')
                    ->default(null),
                TextInput::make('id_proof')
                    ->default(null),
                TextInput::make('resume')
                    ->default(null),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
