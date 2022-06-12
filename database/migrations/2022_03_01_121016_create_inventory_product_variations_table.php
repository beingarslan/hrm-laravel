<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryProductVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_product_variations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->foreignId('inventory_option_id')->nullable()->references('id')->on('inventory_options')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->foreignId('inventory_option_value_id')->nullable()->references('id')->on('inventory_option_values')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->foreignId('product_id')->nullable()->references('id')->on('inventory_products')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->foreignId('updated_by')->nullable()->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

            $table->foreignId('deleted_by')->nullable()->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

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
        Schema::dropIfExists('inventory_product_variations');
    }
}
