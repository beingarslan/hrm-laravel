<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewUser extends Migration{

    public function up(){

        DB::statement("
            CREATE OR REPLACE VIEW view_users AS
            select users.id, users.`uuid`, users.first_name, users.middle_name, users.last_name, users.email, users.phone_no, users.is_blocked, users.created_by, users.role_id,
            roles.`name` as role_name,
            departments.`name` as department_name, departments.id as department_id,
            designations.`name` as designation_name, designations.id as designation_id,
            shift_times.login, shift_times.logout, shift_times.id as shift_time_id, shift_times.name,
            created_by_user.first_name as created_by_first_name, created_by_user.middle_name as created_by_middle_name, created_by_user.last_name as created_by_last_name
            from users
            inner join model_has_roles on users.id = model_has_roles.model_id
            inner join roles on model_has_roles.role_id = roles.id and roles.deleted_at is NULL
            inner join departments on users.department_id = departments.id and departments.deleted_at is NULL
            inner join designations on users.designation_id = designations.id and designations.deleted_at is NULL
            inner join shift_times on users.shift_time_id = shift_times.id and shift_times.deleted_at is NULL
            LEFT join users as created_by_user on users.created_by = created_by_user.id and created_by_user.deleted_at is NULL
            where users.deleted_at is NULL
            order by id DESC;");
    }


    public function down(){

        Schema::dropIfExists('view_user');
    }

}
