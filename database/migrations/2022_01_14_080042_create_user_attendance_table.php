<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserAttendanceTable extends Migration{

    public function up(){

        Schema::create('user_attendances', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->date('attendance_date')->nullable();
            $table->time('login')->nullable();
            $table->time('logout')->nullable();
            $table->tinyInteger('is_late')->default(0)->comment('0=no,1=yes');
            $table->tinyInteger('is_approved')->default(0)->comment('0=no,1=yes');

            $table->bigInteger('duration')->unsigned()->nullable();

            $table->string('check_in_ip_address', 50)->nullable();
            $table->string('check_in_user_agent')->nullable();
            $table->string('check_out_ip_address', 50)->nullable();
            $table->string('check_out_user_agent')->nullable();

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

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

        Schema::dropIfExists('user_attendances');
    }
}
