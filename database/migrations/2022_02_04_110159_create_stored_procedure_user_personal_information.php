<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStoredProcedureUserPersonalInformation extends Migration {

    public function up(){

        DB::unprepared("DROP procedure IF EXISTS store_procedure_user_personal_information");
        DB::unprepared('
            CREATE PROCEDURE `store_procedure_user_personal_information` ( requested_user_id int )
                
            BEGIN

            select users.id, users.first_name, users.middle_name, users.last_name, users.email, users.phone_no, users.gender, users.date_of_birth, users.address, users.map_address, users.city, users.`state`, users.zip, users.date_of_joining, users.lat, users.lng, users.created_at, users.created_by, users.cnic,
            users.about_me,
            created_by_user.first_name as created_by_first_name, created_by_user.middle_name as created_by_middle_name, created_by_user.last_name as created_by_last_name,
            updated_by_user.first_name as updated_by_first_name, updated_by_user.middle_name as updated_by_middle_name, updated_by_user.last_name as updated_by_last_name
            from users
            inner join users as created_by_user on users.created_by = created_by_user.id and created_by_user.deleted_at is NULL
            left join users as updated_by_user on users.updated_by = updated_by_user.id and updated_by_user.deleted_at is NULL
            where users.id = requested_user_id
            and users.deleted_at is NULL;

            END
            ');
    }


    public function down(){

        Schema::dropIfExists('store_procedure_user_personal_information');
    }
}
