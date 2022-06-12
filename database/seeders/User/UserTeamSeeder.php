<?php

namespace Database\Seeders\User;

use Faker\Factory;
use App\Models\User\UserTeam;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserTeamSeeder extends Seeder{

    public function run(){

        Schema::disableForeignKeyConstraints();
        DB::table(config('database.models.UserTeam.table'))->truncate();

        $faker = Factory::create();
        $limit = 300;
        $userTeams = [];

        for ($i=0; $i < $limit; $i++) {

            $userTeam = [
                'user_id' => $faker->numberBetween(1, 101),
                'team_id' => $faker->numberBetween(1, 10),
            ];

            $userTeams[] = $userTeam;
        }

        // bulk insertion in user teams table
        UserTeam::insert($userTeams);

        Schema::enableForeignKeyConstraints();

    }

}
