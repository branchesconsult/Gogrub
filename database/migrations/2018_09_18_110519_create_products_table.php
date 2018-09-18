<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('chef_id')->unsigned()->comment('Chef of the product from users');
            $table->string('name');
            $table->integer('cuisine_id')->unsigned()->comment('PK of cuisine table');
            $table->integer('serving_size')->comment('Serving for how may people');
            $table->integer('total_servings')->comment('How many servings chef made');
            $table->longText('description')->nullable()->default(null);
            $table->double('price')->comment('original price of product');
            $table->double('discounted_price')->default('0')->comment('Will show this price if it is not 0');
            $table->dateTime('availability_form');
            $table->dateTime('availability_to')->nullable()->default(null);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('chef_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cuisine_id')->references('id')->on('cuisines')->onDelete('cascade');
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
