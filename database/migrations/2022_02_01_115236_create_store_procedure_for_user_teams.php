<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStoreProcedureForUserTeams extends Migration{

    public function up(){

        DB::unprepared("DROP procedure IF EXISTS store_procedure_user_teams");
        DB::unprepared('
            CREATE PROCEDURE `store_procedure_user_teams` ( requested_user_id int )
            
            BEGIN

            select users.id,
            user_teams.team_id,
            teams.`name` as team_name, teams.description, teams.slug
            from users
            inner join user_teams on users.id = user_teams.user_id and user_teams.deleted_at is NULL
            inner join teams on user_teams.team_id = teams.id and teams.deleted_at is NULL
            where users.deleted_at is NULL
            and users.id = requested_user_id;

            END
            ');
    }


    public function down(){

        Schema::dropIfExists('store_procedure_user_teams');
    }
}
