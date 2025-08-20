<?php

namespace App\Filament\Widgets;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Employees', Employee::count())
                ->description('Active employees in the system')
                ->descriptionIcon('heroicon-m-users')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('Departments', Department::count())
                ->description('Total departments')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('info')
                ->chart([17, 16, 14, 15, 14, 13, 12]),

            Stat::make('Positions', Position::count())
                ->description('Available job positions')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('warning')
                ->chart([15, 4, 10, 2, 12, 4, 7]),

            Stat::make('Active Employees', Employee::where('employment_status', 'active')->count())
                ->description('Currently active employees')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
        ];
    }
}
