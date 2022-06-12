<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserTeamView extends Migration{

    public function up(){

        DB::statement("
            CREATE OR REPLACE VIEW view_user_teams AS
            select users.id,
            user_teams.team_id,
            teams.`name` as team_name, teams.description, teams.slug
            from users
            inner join user_teams on users.id = user_teams.user_id and user_teams.deleted_at is NULL
            inner join teams on user_teams.team_id = teams.id and teams.deleted_at is NULL
            where users.deleted_at is NULL;");

    }

    public function down(){

        Schema::dropIfExists('view_user_teams');
    }
}
