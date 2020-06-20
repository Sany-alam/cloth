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
            $table->string('size', 100)->default('none')->nullable();
            $table->string('weight', 100)->default('none')->nullable();
            $table->string('fabric', 100)->default('none')->nullable();
            $table->boolean('stock')->default(false)->nullable();
            $table->longText('description')->nullable();
            $table->string('brand', 50)->default('none')->nullable();
            $table->string('color', 100)->default('none')->nullable();
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
