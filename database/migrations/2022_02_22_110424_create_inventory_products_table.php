<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable();
            $table->string('sku', 250)->nullable();
            $table->integer('cost_price')->nullable();
            $table->integer('sale_price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->integer('discount_percentage')->nullable();
            $table->string('slug',250)->nullable();
            $table->text('description')->nullable();

            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->foreignId('product_type_id')->nullable()->references('id')->on('inventory_types')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreignId('product_category_id')->nullable()->references('id')->on('inventory_categories')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreignId('product_status_id')->nullable()->references('id')->on('inventory_statuses')->onUpdate('RESTRICT')->onDelete('CASCADE');

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
        Schema::dropIfExists('inventory_products');
    }
}
