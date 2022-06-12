<?php

namespace Database\Seeders;

use App\Models\User\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AddDevelopersAccount extends Seeder{

    public function run(){

        $faker = Factory::create();

        DB::table(config('database.models.User.table'))->insert([

            [
                'uuid' => '00120',
                'first_name' => 'Developer',
                'middle_name' => '',
                'last_name' => 'PHP',
                'email' => 'developer@gmail.com',
                'password' => Hash::make('dm_hrm'),
                'about_me' => $faker->text('1000'),
                'date_of_birth' => $faker->date(),
                'date_of_joining' => $faker->date(),
                'gender' => $faker->numberBetween(1, 3),
                'shift_time_id' => $faker->numberBetween(1, 5),
                'role_id' => 1,
                'designation_id' => $faker->numberBetween(1, 26),
                'department_id' => $faker->numberBetween(1, 5),
                'phone_no' => $faker->phoneNumber(),
                'address' => $faker->streetAddress(),
                'map_address' => $faker->streetAddress(),
                'city' => $faker->city(),
                'state' => $faker->stateAbbr,
                'zip' => $faker->postcode(),
                'lat' => $faker->latitude(),
                'lng' => $faker->longitude(),
                'email_verified' => 1,
                'phone_verified' => 1,
                'is_login' => 0,
                'is_blocked' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'supervisor_id' => 1,
            ],
            [
                'uuid' => '0007',
                'first_name' => 'Arslan',
                'middle_name' => '',
                'last_name' => 'Aslam',
                'email' => 'admin@admin.com',
                'password' => Hash::make('1234567890'),
                'about_me' => $faker->text('1000'),
                'date_of_birth' => $faker->date(),
                'date_of_joining' => $faker->date(),
                'gender' => $faker->numberBetween(1, 3),
                'shift_time_id' => $faker->numberBetween(1, 5),
                'role_id' => 1,
                'designation_id' => $faker->numberBetween(1, 26),
                'department_id' => $faker->numberBetween(1, 5),
                'phone_no' => $faker->phoneNumber(),
                'address' => $faker->streetAddress(),
                'map_address' => $faker->streetAddress(),
                'city' => $faker->city(),
                'state' => $faker->stateAbbr,
                'zip' => $faker->postcode(),
                'lat' => $faker->latitude(),
                'lng' => $faker->longitude(),
                'email_verified' => 1,
                'phone_verified' => 1,
                'is_login' => 0,
                'is_blocked' => 0,
                'created_by' => 1,
                'updated_by' => 1,
                'supervisor_id' => 6,
            ],

        ]);

        $users = User::whereIn('uuid', ['00120', '0007'])->get();
        foreach ($users as $user) {
            $user->assignRole('Super Admin');
        }
    }


}
