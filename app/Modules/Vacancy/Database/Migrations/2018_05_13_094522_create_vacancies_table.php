<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('department_id');
            $table->string('title');
            $table->string('employee_type_id');
            $table->text('detail');
            $table->boolean('status')->default(1);
            $table->integer('sort_order')->nullable();
            $table->text('skills');
            $table->string('additional_info')->nullable();
            $table->string('qualification')->nullable();
            $table->string('experience')->nullable();
            $table->string('location')->nullable();
            $table->string('count')->nullable();


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
        Schema::dropIfExists('vacancies');
    }
}
