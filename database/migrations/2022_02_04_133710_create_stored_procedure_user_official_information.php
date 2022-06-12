<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStoredProcedureUserOfficialInformation extends Migration{


    public function up(){

        DB::unprepared("DROP procedure IF EXISTS store_procedure_user_official_information");
        DB::unprepared('
            CREATE PROCEDURE `store_procedure_user_official_information` ( requested_user_id int )
                
            BEGIN

            select users.id, users.role_id, users.department_id, users.designation_id, users.shift_time_id, users.employee_id, users.date_of_joining, users.date_of_probation_end, users.supervisor_id,
            departments.`name` as department_name,
            designations.`name` as designation_name,
            roles.`name` as role_name, 
            shift_times.`name` as shift_time_name
            from users
            inner join departments on users.department_id = departments.id and departments.deleted_at is NULL
            inner join designations on users.designation_id = designations.id and designations.deleted_at is NULL
            inner join roles on users.role_id = roles.id and roles.deleted_at is NULL
            inner join shift_times on users.shift_time_id = shift_times.id and shift_times.deleted_at is NULL
            where users.id = requested_user_id
            and users.deleted_at is NULL;

            END
            ');
    }

    public function down(){

        Schema::dropIfExists('store_procedure_user_official_information');
    }

}
