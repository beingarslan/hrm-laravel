<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryUniqueProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_unique_products', function (Blueprint $table) {
            $table->id();
            $table->string('serial_no', 250)->nullable();
            $table->json('qa_code')->nullable();

            $table->foreignId('product_id')->nullable()->references('id')->on('inventory_products')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreignId('product_status_id')->nullable()->references('id')->on('inventory_statuses')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->bigInteger('deleted_by')->unsigned()->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_unique_products');
    }
}
