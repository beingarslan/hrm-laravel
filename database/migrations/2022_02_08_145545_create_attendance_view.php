<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAttendanceView extends Migration{

    public function up(){

        DB::statement("
            CREATE OR REPLACE VIEW view_attendance AS
            select MIN(user_attendances.login) as first_login, MAX(user_attendances.logout) last_logout, sum(user_attendances.duration) as duration, user_attendances.is_late,
            user_attendances.is_approved, user_attendances.user_id, user_attendances.attendance_date,
            users.first_name, users.middle_name, users.last_name, users.employee_id, users.email, users.department_id, users.designation_id, users.role_id, users.shift_time_id,
            departments.`name` as department_name,
            designations.`name` as designation_name,
            roles.`name` as role_name,
            shift_times.`name` as shift_time_name,
            GROUP_CONCAT(DISTINCT user_teams.team_id SEPARATOR ', ') as team_ids,
            GROUP_CONCAT(DISTINCT teams.`name` SEPARATOR ', ') as team_names
            from user_attendances
            inner join users on user_attendances.user_id = users.id and users.deleted_at is NULL
            inner join departments on users.department_id = departments.id and departments.deleted_at is NULL
            inner join designations on users.designation_id = designations.id and designations.deleted_at is NULL
            inner join roles on users.role_id = roles.id and roles.deleted_at is NULL
            inner join shift_times on users.shift_time_id = shift_times.id and shift_times.deleted_at is NULL
            inner join user_teams on user_attendances.user_id = user_teams.user_id and user_teams.deleted_at is NULL
            inner join teams on user_teams.team_id = teams.id and teams.deleted_at is NULL
            where user_attendances.deleted_at is NULL
            GROUP by user_attendances.attendance_date;");
    }


    public function down(){

        Schema::dropIfExists('view_attendance');
    }
}
