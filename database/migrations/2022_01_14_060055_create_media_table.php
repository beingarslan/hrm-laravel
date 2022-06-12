<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMediaTable extends Migration{

    public function up(){

        Schema::create('media', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('unique_name')->nullable();
            $table->string('link')->nullable();
            $table->string('base_url')->nullable();
            $table->string('extension')->nullable();
            $table->string('size')->nullable();
            $table->string('alt_tag')->nullable();
            $table->string('title')->nullable();
            $table->string('batch_no')->nullable();
            $table->text('description')->nullable();

            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('media_type_id')->unsigned()->nullable();
            $table->foreign('media_type_id')->references('id')->on('media_types')->onUpdate('RESTRICT')->onDelete('CASCADE');

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

        Schema::dropIfExists('media');
    }
}
