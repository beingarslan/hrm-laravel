<?php

namespace Database\Seeders\Approval;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ApprovalTypeSeeder extends Seeder{

    public function run(){

        Schema::disableForeignKeyConstraints();
        DB::table(config('database.models.ApprovalType.table'))->truncate();

        DB::table(config('database.models.ApprovalType.table'))->insert([
            ['name' => 'Work From Home', 'slug' => 'work_from_home', 'description' => 'Work from home request'],
            ['name' => 'Late login', 'slug' => 'late_login', 'description' => 'late login'],
            ['name' => 'Leave', 'slug' => 'leave', 'description' => 'Leave'],
            ['name' => 'Absent', 'slug' => 'absent', 'description' => 'absent'],
            ['name' => 'Overtime', 'slug' => 'overtime', 'description' => 'overtime'],
            ['name' => 'Undertime', 'slug' => 'undertime', 'description' => 'undertime'],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
