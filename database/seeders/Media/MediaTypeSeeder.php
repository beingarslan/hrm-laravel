<?php

namespace Database\Seeders\Media;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MediaTypeSeeder extends Seeder{

    public function run(){

        Schema::disableForeignKeyConstraints();
        DB::table(config('database.models.MediaTypes.table'))->truncate();

        DB::table(config('database.models.MediaTypes.table'))->insert([

            ['name' => 'User profile pic', 'slug' => 'user_profile_pic', 'description' => 'User profile pic'],

        ]);

        Schema::enableForeignKeyConstraints();
    }
}
