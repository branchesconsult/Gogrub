<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('chef_id')->unsigned();
            $table->string('invoice_num');
            $table->longText('special_instructions')->nullable()->default(null);
            $table->integer('orderstatus_id')->unsigned();
            $table->double('gogrub_commission')->default(0);
            //Chef info
            $table->string('chef_full_name');
            $table->string('chef_phone');
            $table->string('chef_email')->nullable()->default(null);
            $table->point('chef_location');

            //Customer info
            $table->string('customer_full_name');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable()->default(null);
            $table->string('customer_address');
            $table->string('customer_city')->nullable();
            $table->string('customer_province')->nullable();
            $table->string('customer_country')->default('PK');
            $table->point('customer_location');
            $table->integer('estimate_delivery_mins');
            $table->string('slug')->nullable();

            $table->string('coupon_code')->nullable();
            $table->double('discount')->default(0);
            $table->enum('discount_type', ['percentage', 'fixed'])->nullable();
            $table->double('delivery_charges')->default(0)->comment('Approx. delivery charges');
            $table->double('subtotal');
            $table->double('gogrub_commission')->default(5)->comment('in percentage');
            $table->enum('payment_method', ['cod', '2co', 'easypay', 'mobicash']);
            $table->timestamps();
            $table->softDeletes();
            //Foriegn keys
            $table->foreign('chef_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
