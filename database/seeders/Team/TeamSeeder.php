<?php

namespace Database\Seeders\Team;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TeamSeeder extends Seeder{

    public function run(){

        Schema::disableForeignKeyConstraints();
        DB::table(config('database.models.Team.table'))->truncate();

        DB::table(config('database.models.Team.table'))->insert([


            ['name' => 'admin', 'slug' => 'admin', 'description' => 'admin'],
            ['name' => 'Accounts', 'slug' => 'accounts', 'description' => 'accounts'],
            ['name' => 'HR', 'slug' => 'hr', 'description' => 'HR'],

            ['name' => 'PHP', 'slug' => 'php', 'description' => 'php'],
            ['name' => 'Node', 'slug' => 'node', 'description' => 'node'],
            ['name' => 'iOS', 'slug' => 'ios', 'description' => 'IOS'],
            ['name' => 'Angular', 'slug' => 'ios', 'description' => 'Angular'],

            ['name' => 'Supply', 'slug' => 'supply', 'description' => 'Supply'],
            ['name' => 'Medical', 'slug' => 'medical', 'description' => 'Medical'],
            ['name' => 'BP Ortho', 'slug' => 'bp_orhto', 'description' => 'BP Ortho'],

        ]);

        Schema::enableForeignKeyConstraints();
    }

}
