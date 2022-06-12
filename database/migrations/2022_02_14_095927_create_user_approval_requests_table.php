<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateUserApprovalRequestsTable extends Migration
{


    public function up()
    {

        Schema::create('user_approval_requests', function (Blueprint $table) {

            $table->id();
            $table->string('title')->nullable();
            $table->bigInteger('approval_date')->unsigned()->nullable();
            

            $table->bigInteger('approval_status_id')->unsigned()->nullable();
            $table->foreign('approval_status_id')->references('id')->on('approval_status')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('approval_type_id')->unsigned()->nullable();
            $table->foreign('approval_type_id')->references('id')->on('approval_types')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('supervisor_id')->unsigned()->nullable();
            $table->foreign('supervisor_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('deleted_by')->unsigned()->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->softDeletes()->index();

            $table->timestamps();
        });
    }


    public function down()
    {

        Schema::dropIfExists('user_approval_requests');
    }
}
