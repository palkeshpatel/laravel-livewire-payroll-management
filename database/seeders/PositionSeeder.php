<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            [
                'title' => 'HR Manager',
                'description' => 'Manages human resources operations and policies',
                'salary_grade' => 'MG1',
                'min_salary' => 60000,
                'max_salary' => 80000,
                'status' => 'active',
            ],
            [
                'title' => 'HR Executive',
                'description' => 'Handles recruitment, employee relations, and HR administration',
                'salary_grade' => 'EX1',
                'min_salary' => 35000,
                'max_salary' => 50000,
                'status' => 'active',
            ],
            [
                'title' => 'Software Developer',
                'description' => 'Develops software applications and systems',
                'salary_grade' => 'DEV1',
                'min_salary' => 45000,
                'max_salary' => 70000,
                'status' => 'active',
            ],
            [
                'title' => 'Senior Developer',
                'description' => 'Leads development projects and mentors junior developers',
                'salary_grade' => 'DEV2',
                'min_salary' => 70000,
                'max_salary' => 100000,
                'status' => 'active',
            ],
            [
                'title' => 'IT Manager',
                'description' => 'Manages IT infrastructure and technical operations',
                'salary_grade' => 'MG2',
                'min_salary' => 65000,
                'max_salary' => 90000,
                'status' => 'active',
            ],
            [
                'title' => 'Accountant',
                'description' => 'Handles financial accounting and reporting',
                'salary_grade' => 'ACC1',
                'min_salary' => 40000,
                'max_salary' => 60000,
                'status' => 'active',
            ],
            [
                'title' => 'Finance Manager',
                'description' => 'Manages financial operations and budgeting',
                'salary_grade' => 'MG3',
                'min_salary' => 70000,
                'max_salary' => 95000,
                'status' => 'active',
            ],
            [
                'title' => 'Marketing Executive',
                'description' => 'Handles marketing campaigns and brand management',
                'salary_grade' => 'MKT1',
                'min_salary' => 35000,
                'max_salary' => 55000,
                'status' => 'active',
            ],
            [
                'title' => 'Sales Executive',
                'description' => 'Manages sales operations and client relationships',
                'salary_grade' => 'SALES1',
                'min_salary' => 30000,
                'max_salary' => 50000,
                'status' => 'active',
            ],
            [
                'title' => 'Sales Manager',
                'description' => 'Leads sales team and manages sales strategy',
                'salary_grade' => 'MG4',
                'min_salary' => 60000,
                'max_salary' => 85000,
                'status' => 'active',
            ],
            [
                'title' => 'Customer Support Executive',
                'description' => 'Provides customer service and technical support',
                'salary_grade' => 'CS1',
                'min_salary' => 25000,
                'max_salary' => 40000,
                'status' => 'active',
            ],
            [
                'title' => 'Operations Manager',
                'description' => 'Manages day-to-day business operations',
                'salary_grade' => 'MG5',
                'min_salary' => 55000,
                'max_salary' => 75000,
                'status' => 'active',
            ],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
