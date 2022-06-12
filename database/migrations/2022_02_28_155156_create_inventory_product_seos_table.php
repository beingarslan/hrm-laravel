<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryProductSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_product_seos', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250)->nullable();
            $table->text('keywords')->nullable();
            $table->text('tags')->nullable();
            $table->text('description')->nullable();

            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');

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
        Schema::dropIfExists('inventory_product_seos');
    }
}
