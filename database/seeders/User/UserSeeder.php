<?php

namespace Database\Seeders\User;

use Faker\Factory;
use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{

    public function run()
    {

        Schema::disableForeignKeyConstraints();
        DB::table(config('database.models.User.table'))->truncate();

        $faker = Factory::create();
        $limit = 5;
        $users = [
            [
                'id' => 1,
                'uuid' => $faker->uuid(),
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'super-admin@domain.com',
                'password' => Hash::make('super-admin'),
                'about_me' => $faker->text('1000'),
                'date_of_birth' => $faker->date(),
                'date_of_joining' => $faker->date(),
                'gender' => $faker->numberBetween(1, 3),
                'shift_time_id' => $faker->numberBetween(1, 5),
                'role_id' => $faker->numberBetween(1, 6),
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
            ],
            [
                'id' => 2,
                'uuid' => $faker->uuid(),
                'first_name' => 'Admin',
                'last_name' => 'Account',
                'email' => 'admin@domain.com',
                'password' => Hash::make('admin'),
                'about_me' => $faker->text('1000'),
                'date_of_birth' => $faker->date(),
                'date_of_joining' => $faker->date(),
                'gender' => $faker->numberBetween(1, 3),
                'shift_time_id' => $faker->numberBetween(1, 5),
                'role_id' => $faker->numberBetween(1, 6),
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
            ],
            [
                'id' => 3,
                'uuid' => $faker->uuid(),
                'first_name' => 'HR',
                'last_name' => 'Account',
                'email' => 'hr@domain.com',
                'password' => Hash::make('hr'),
                'about_me' => $faker->text('1000'),
                'date_of_birth' => $faker->date(),
                'date_of_joining' => $faker->date(),
                'gender' => $faker->numberBetween(1, 3),
                'shift_time_id' => $faker->numberBetween(1, 5),
                'role_id' => $faker->numberBetween(1, 6),
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
            ],
            [
                'id' => 4,
                'uuid' => $faker->uuid(),
                'first_name' => 'Supervisor',
                'last_name' => 'Account',
                'email' => 'supervisor@domain.com',
                'password' => Hash::make('supervisor'),
                'about_me' => $faker->text('1000'),
                'date_of_birth' => $faker->date(),
                'date_of_joining' => $faker->date(),
                'gender' => $faker->numberBetween(1, 3),
                'shift_time_id' => $faker->numberBetween(1, 5),
                'role_id' => $faker->numberBetween(1, 6),
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
            ],
            [
                'id' => 5,
                'uuid' => $faker->uuid(),
                'first_name' => 'Employee',
                'last_name' => 'Account',
                'email' => 'employee@domain.com',
                'password' => Hash::make('employee'),
                'about_me' => $faker->text('1000'),
                'date_of_birth' => $faker->date(),
                'date_of_joining' => $faker->date(),
                'gender' => $faker->numberBetween(1, 3),
                'shift_time_id' => $faker->numberBetween(1, 5),
                'role_id' => $faker->numberBetween(1, 6),
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
            ],
        ];

        // for ($i = 0; $i < $limit; $i++) {

        //     $user = [
        //         'uuid' => $faker->uuid(),
        //         'first_name' => $faker->firstName(),
        //         'middle_name' => $faker->lastName(),
        //         'last_name' => $faker->lastName(),
        //         'email' => $faker->safeEmail(),
        //         'password' => Hash::make('1234567890'),
        //         'about_me' => $faker->text('1000'),
        //         'date_of_birth' => $faker->date(),
        //         'date_of_joining' => $faker->date(),
        //         'gender' => $faker->numberBetween(1, 3),
        //         'shift_time_id' => $faker->numberBetween(1, 5),
        //         'role_id' => $faker->numberBetween(1, 6),
        //         'designation_id' => $faker->numberBetween(1, 26),
        //         'department_id' => $faker->numberBetween(1, 5),
        //         'phone_no' => $faker->phoneNumber(),
        //         'address' => $faker->streetAddress(),
        //         'map_address' => $faker->streetAddress(),
        //         'city' => $faker->city(),
        //         'state' => $faker->stateAbbr,
        //         'zip' => $faker->postcode(),
        //         'lat' => $faker->latitude(),
        //         'lng' => $faker->longitude(),
        //         'email_verified' => 1,
        //         'phone_verified' => 1,
        //         'is_login' => 0,
        //         'is_blocked' => 0,
        //         'created_by' => 1,
        //         'updated_by' => 1,
        //     ];

        //     $users[] = $user;
        // }

        // bulk insertion in user table
        User::insert($users);

        User::where('id', 1)->first()->assignRole(User::ROLE_SUPER_ADMIN);
        User::where('id', 2)->first()->assignRole(User::ROLE_ADMIN);
        User::where('id', 3)->first()->assignRole(User::ROLE_HR);
        User::where('id', 4)->first()->assignRole(User::ROLE_SUPERVISOR);
        User::where('id', 5)->first()->assignRole(User::ROLE_EMPLOYEE);

        Schema::enableForeignKeyConstraints();
    }
}
