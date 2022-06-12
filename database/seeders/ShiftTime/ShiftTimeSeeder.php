<?php

namespace Database\Seeders\ShiftTime;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ShiftTimeSeeder extends Seeder {

    public function run(){

        Schema::disableForeignKeyConstraints();
        DB::table(config('database.models.ShiftTime.table'))->truncate();

        DB::table(config('database.models.ShiftTime.table'))->insert([

            ['name' => 'Morning 8am to 5pm', 'slug' => 'morning_8_to_17', 'buffer_time' => 30, 'login' => '08:00:00', 'logout' => '17:00:00', 'break_in' => '13:00:00', 'break_out' => '14:00:00'],
            ['name' => 'Morning 9am to 6pm', 'slug' => 'morning_9_to_18', 'buffer_time' => 30, 'login' => '09:00:00', 'logout' => '18:00:00', 'break_in' => '14:00:00', 'break_out' => '15:00:00'],
            ['name' => 'Morning 10am to 7pm', 'slug' => 'morning_10_to_19', 'buffer_time' => 30, 'login' => '10:00:00', 'logout' => '19:00:00', 'break_in' => '15:00:00', 'break_out' => '16:00:00'],
            ['name' => 'Morning 11am to 8pm', 'slug' => 'morning_11_to_20', 'buffer_time' => 30, 'login' => '11:00:00', 'logout' => '20:00:00', 'break_in' => '16:00:00', 'break_out' => '17:00:00'],
            ['name' => 'Morning 5pm to 2am', 'slug' => 'morning_17_to_2', 'buffer_time' => 30, 'login' => '17:00:00', 'logout' => '02:00:00', 'break_in' => '22:00:00', 'break_out' => '23:00:00'],

        ]);

        Schema::enableForeignKeyConstraints();

    }
}
