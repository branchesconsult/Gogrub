<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('full_name', 191);
            $table->string('email', 191)->unique();
            $table->string('mobile')->unique();
            $table->integer('country_code')->default(92);
            $table->string('avatar')->nullable()->default(null);
            $table->date('dob')->nullable();
            $table->string('password', 191)->nullable();
            $table->boolean('is_chef')->default(0);
            $table->boolean('status')->default(1);
            $table->string('confirmation_code', 191)->nullable()->comment('Mobile confirmation code');
            $table->boolean('confirmed')->default(0)->comment('is mobile number confirmed?');
            $table->boolean('is_term_accept')->default(1)->comment(' 0 = not accepted,1 = accepted');
            $table->string('remember_token', 100)->nullable();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
