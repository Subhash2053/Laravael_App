<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancy', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('department_id');
            $table->string('name');
            $table->string('profile_image')->nullable();
            $table->text('detail');
            $table->boolean('status')->default(1);
            $table->integer('sort_order')->nullable();
            $table->string('designation')->nullable();
            $table->string('specialization')->nullable();
            $table->string('degree')->nullable();


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
        Schema::dropIfExists('vacancy');
    }
}
