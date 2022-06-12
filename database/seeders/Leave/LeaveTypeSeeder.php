<?php

namespace Database\Seeders\Leave;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table(config('database.models.LeaveType.table'))->truncate();

        DB::table(config('database.models.LeaveType.table'))->insert([

            ['name' => 'Casual', 'slug' => 'casual', 'description' => 'Casual', 'total' => 10],
            ['name' => 'Sick', 'slug' => 'sick', 'description' => 'Sick', 'total' => 5],
            ['name' => 'Annual', 'slug' => 'annual', 'description' => 'Annual', 'total' => 15],
            ]);

    }
}
