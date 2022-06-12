<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateShiftTimeTable extends Migration{

    public function up(){

        Schema::create('shift_times', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name', 250)->nullable();
            $table->string('slug',250)->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('buffer_time')->nullable()->comment('number in mints');
            $table->time('login')->nullable();
            $table->time('logout')->nullable();
            $table->time('break_in')->nullable();
            $table->time('break_out')->nullable();

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

        Schema::dropIfExists('shift_times');
    }

}
