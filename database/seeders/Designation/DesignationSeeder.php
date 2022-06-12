<?php

namespace Database\Seeders\Designation;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DesignationSeeder extends Seeder{

    public function run(){

        Schema::disableForeignKeyConstraints();
        DB::table(config('database.models.Designation.table'))->truncate();

        DB::table(config('database.models.Designation.table'))->insert([


            ['name' => 'Admin Executive', 'slug' => 'admin_executive', 'description' => 'Admin Executive'],
            ['name' => 'Manager Grounds & Administration', 'slug' => 'manager_grounds_and_administration', 'description' => 'Manager Grounds & Administration'],

            ['name' => 'Accounts Executive', 'slug' => 'accounts_executive', 'description' => 'Accounts Executive'],

            ['name' => 'Human Resource Executive', 'slug' => 'human_resource_executive', 'description' => 'Human Resource Executive'],
            ['name' => 'HR Generalist', 'slug' => 'hr_generalist', 'description' => 'HR Generalist'],

            ['name' => 'Senior BPO Operations Executive', 'slug' => 'senior_bpo_operations_executive', 'description' => 'Senior BPO Operations Executive'],
            ['name' => 'Assistant Manager BPO Operations', 'slug' => 'assistant_manager_bpo_operations', 'description' => 'Assistant Manager BPO Operations'],
            ['name' => 'BPO Operations Executive', 'slug' => 'bpo_operations_executive', 'description' => 'BPO Operations Executive'],

            ['name' => 'Electrician', 'slug' => 'electrician', 'description' => 'Electrician'],
            ['name' => 'Tea Boy', 'slug' => 'tea_boy', 'description' => 'Tea Boy'],

            ['name' => 'Chief Technology Officer', 'slug' => 'chief_technology_officer', 'description' => 'Chief Technology Officer'],
            ['name' => 'Technology Consultant', 'slug' => 'technology_consultant', 'description' => 'Technology Consultant'],
            ['name' => 'Project Coordinator', 'slug' => 'project_coordinator', 'description' => 'Project Coordinator'],
            ['name' => 'IT Executive', 'slug' => 'it_executive', 'description' => 'IT Executive'],

            ['name' => 'Senior Software Engineer', 'slug' => 'senior_software_engineer', 'description' => 'Senior Software Engineer'],
            ['name' => 'Software Engineer', 'slug' => 'software_engineer', 'description' => 'Software Engineer'],
            ['name' => 'intern Software Engineer', 'slug' => 'intern_software_engineer', 'description' => 'Intern Software Engineer'],

            ['name' => 'Senior QA Engineer', 'slug' => 'senior_qa_engineer', 'description' => 'Senior QA Engineer'],
            ['name' => 'QA Engineer', 'slug' => 'qa_engineer', 'description' => 'QA Engineer'],
            ['name' => 'intern QA Engineer', 'slug' => 'intern_qa_engineer', 'description' => 'Intern QA Engineer'],

            ['name' => 'Senior DevOps Engineer', 'slug' => 'senior_dev_ops_engineer', 'description' => 'Senior DevOps Engineer'],
            ['name' => 'DevOps Engineer', 'slug' => 'dev_ops_engineer', 'description' => 'DevOps Engineer'],
            ['name' => 'Senior DevOps Engineer', 'slug' => 'intern_dev_ops_engineer', 'description' => 'Intern DevOps Engineer'],

            ['name' => 'Business Analysis', 'slug' => 'business_analysis', 'description' => 'Business Analysis'],
            ['name' => 'Intern Business Analysis', 'slug' => 'intern_business_analysis', 'description' => 'Intern Business Analysis'],

            ['name' => 'Content Writer', 'slug' => 'content_writer', 'description' => 'Content Writer'],


        ]);

        Schema::enableForeignKeyConstraints();

    }
}
