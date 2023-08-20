<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Department::create([
            'name' => 'عام',
        ]);
        Department::create([
            'name' => 'التصميم',
        ]);
        Department::create([
            'name' => 'البرمجة',
        ]);

    }
}
