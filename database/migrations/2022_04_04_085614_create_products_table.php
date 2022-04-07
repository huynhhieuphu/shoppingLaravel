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
            $table->increments('id');
            $table->string('name', 200)->unique();
            $table->string('slug', 220);
            $table->text('image')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->tinyInteger('quantity')->unsigned();
            $table->text('descriptions')->nullable();
            $table->integer('price')->unsigned();
            $table->integer('sale_off')->default(0)->unsigned();
            $table->integer('count_views')->default(1)->unsigned();
            $table->boolean('status')->default(1);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
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
