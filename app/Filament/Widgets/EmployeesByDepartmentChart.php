<?php

namespace App\Filament\Widgets;

use App\Models\Department;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class EmployeesByDepartmentChart extends ChartWidget
{
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Department::select('departments.name', DB::raw('count(employees.id) as employee_count'))
            ->leftJoin('employees', 'departments.id', '=', 'employees.department_id')
            ->groupBy('departments.id', 'departments.name')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Employees',
                    'data' => $data->pluck('employee_count')->toArray(),
                    'backgroundColor' => [
                        '#3B82F6',
                        '#10B981',
                        '#F59E0B',
                        '#EF4444',
                        '#8B5CF6',
                        '#06B6D4',
                        '#84CC16',
                        '#F97316'
                    ],
                ],
            ],
            'labels' => $data->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
