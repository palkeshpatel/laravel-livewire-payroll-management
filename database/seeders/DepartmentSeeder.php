<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Human Resources',
                'description' => 'Manages employee relations, recruitment, and HR policies',
                'status' => 'active',
            ],
            [
                'name' => 'Information Technology',
                'description' => 'Handles software development, IT infrastructure, and technical support',
                'status' => 'active',
            ],
            [
                'name' => 'Finance & Accounting',
                'description' => 'Manages financial operations, budgeting, and accounting',
                'status' => 'active',
            ],
            [
                'name' => 'Marketing',
                'description' => 'Handles marketing strategies, branding, and customer acquisition',
                'status' => 'active',
            ],
            [
                'name' => 'Sales',
                'description' => 'Manages sales operations, client relationships, and revenue generation',
                'status' => 'active',
            ],
            [
                'name' => 'Operations',
                'description' => 'Handles day-to-day business operations and process management',
                'status' => 'active',
            ],
            [
                'name' => 'Customer Support',
                'description' => 'Provides customer service and technical support',
                'status' => 'active',
            ],
            [
                'name' => 'Research & Development',
                'description' => 'Focuses on innovation, product development, and research',
                'status' => 'active',
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
