<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateUserTable extends Migration{

    public function up(){

        Schema::table('users', function (Blueprint $table) {

            $table->string('uuid', 200)->nullable();
            $table->string('first_name', 255)->index()->nullable();
            $table->string('middle_name', 255)->index()->nullable();
            $table->string('last_name', 255)->index()->nullable();
            $table->text('about_me')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->date('date_of_probation_end')->nullable();
            $table->string('employee_id', 255)->nullable();
            $table->tinyInteger('gender')->nullable()->comment('1=male, 2=female, 3=other');

            $table->string('cnic')->nullable();

            $table->bigInteger('supervisor_id')->unsigned()->nullable();
            $table->foreign('supervisor_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('shift_time_id')->unsigned()->nullable();
            $table->foreign('shift_time_id')->references('id')->on('shift_times')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('role_id')->unsigned()->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('designation_id')->unsigned()->nullable();
            $table->foreign('designation_id')->references('id')->on('designations')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->string('phone_no', 500)->index()->nullable();
            $table->string('address', 1000)->nullable();
            $table->string('map_address', 1500)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('zip', 50)->nullable();
            $table->string('lat', 100)->nullable();
            $table->string('lng', 100)->nullable();
            $table->tinyInteger('email_verified')->default(0)->comment('0=no, 1=yes');
            $table->tinyInteger('phone_verified')->default(0)->comment('0=no, 1=yes');
            $table->tinyInteger('is_login')->default(0)->comment('0=no, 1=yes');
            $table->tinyInteger('is_blocked')->default(0)->comment('0=no, 1=yes');

            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('deleted_by')->unsigned()->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes()->index();

        });
    }

    public function down(){

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('uuid');
            $table->dropColumn('first_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('last_name');
            $table->dropColumn('email');
            $table->dropColumn('phone_no');
            $table->dropColumn('address');
            $table->dropColumn('map_address');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('zip');
            $table->dropColumn('lat');
            $table->dropColumn('lng');
            $table->dropColumn('email_verified');
            $table->dropColumn('phone_verified');
            $table->dropColumn('is_login');
            $table->dropColumn('is_blocked');

            $table->dropForeign(['shift_time_id']);
            $table->dropColumn('shift_time_id');

            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');

            $table->dropForeign(['designation_id']);
            $table->dropColumn('designation_id');

            $table->dropForeign(['department_id']);
            $table->dropColumn('department_id');

            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');

            $table->dropForeign(['updated_by']);
            $table->dropColumn('updated_by');

            $table->dropForeign(['deleted_by']);
            $table->dropColumn('deleted_by');

        });
    }
}
