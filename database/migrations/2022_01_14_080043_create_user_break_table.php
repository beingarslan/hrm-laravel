<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserBreakTable extends Migration
{

    public function up()
    {

        Schema::create('user_breaks', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->time('break_in')->nullable();
            $table->time('break_out')->nullable();

            $table->bigInteger('duration')->unsigned()->nullable();

            $table->string('break_in_ip_address', 50)->nullable();
            $table->string('break_in_user_agent')->nullable();
            $table->string('break_out_ip_address', 50)->nullable();
            $table->string('break_out_user_agent')->nullable();

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('deleted_by')->unsigned()->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->foreignId('user_attendance_id')->references('id')->on('user_attendances')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes()->index();
        });
    }

    public function down()
    {

        Schema::dropIfExists('user_breaks');
    }
}
