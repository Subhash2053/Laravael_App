<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('parent')->nullable();
            $table->string('name')->nullable();
            $table->string('user_field');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('business_name')->nullable();
            $table->integer('no_of_child')->nullable();
            $table->string('username');
            $table->string('profile_image')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('user_type')->nullable();
            $table->boolean('status')->default(1);
            $table->string('active')->nullable();
            $table->dateTime('last_active')->nullable();

            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
