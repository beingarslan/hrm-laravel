<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserDailyAttendanceView extends Migration{

    public function up(){

        DB::statement("
            CREATE OR REPLACE VIEW view_user_daily_attendance AS
            select MIN(user_attendances.login) as first_login, MAX(user_attendances.logout) last_logout, sum(user_attendances.duration) as duration, user_attendances.is_late, user_attendances.is_approved, user_attendances.user_id, user_attendances.attendance_date
            from user_attendances 
            where user_attendances.deleted_at is NULL
            GROUP by user_attendances.attendance_date;");

    }

    public function down(){

        Schema::dropIfExists('view_user_daily_attendance');
    }
}
