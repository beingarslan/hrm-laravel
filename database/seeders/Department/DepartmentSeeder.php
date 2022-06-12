<?php

namespace Database\Seeders\Department;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DepartmentSeeder extends Seeder{

    public function run(){

        Schema::disableForeignKeyConstraints();
        DB::table(config('database.models.Department.table'))->truncate();

        DB::table(config('database.models.Department.table'))->insert([

            ['name' => 'Grounds & Administration', 'slug' => 'ground_and_administration', 'description' => 'Grounds & Administration'],
            ['name' => 'Finance & Accounts', 'slug' => 'finance_and_accounts', 'description' => 'Finance & Accounts'],
            ['name' => 'Human Resource', 'slug' => 'human_resource', 'description' => 'Human Resource'],
            ['name' => 'Business Analysis', 'slug' => 'business_analysis', 'description' => 'Business Analysis'],
            ['name' => 'Project Management', 'slug' => 'project_management', 'description' => 'Project Management'],
            ['name' => 'Software Development', 'slug' => 'software_development', 'description' => 'Software Development'],
            ['name' => 'Quality Assurance', 'slug' => 'quality_assurance', 'description' => 'Quality Assurance'],
            ['name' => 'BPO Operations', 'slug' => 'bpo_operations', 'description' => 'BPO Operations'],

        ]);

        Schema::enableForeignKeyConstraints();
    }

}
