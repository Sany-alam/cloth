<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->char('name', 100);
            $table->float('price')->nullable();
            $table->string('size', 100)->nullable()->default('none');
            $table->string('weight', 100)->nullable()->default('none');
            $table->string('fabric', 100)->nullable()->default('none');
            $table->boolean('stock')->nullable()->default(false);
            $table->longText('description')->nullable();
            $table->string('brand', 50)->nullable()->default('none');
            $table->string('color', 100)->nullable()->default('none');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
