<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representatives', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 100)->nullable(false)->comment('Фамилия');
            $table->string('first_name', 100)->nullable(false)->comment('Имя');
            $table->string('middle_name', 100)->nullable(false)->comment('Отчество');
            $table->string('phone', 12)->nullable()->comment('Телефон');
            $table->date('birth_date')->nullable()->comment('Дата рождения');
            $table->foreignId('gender_id')->nullable()->comment('ID пола');
            $table->timestamps();

            $table->foreign('gender_id')->references('id')->on('genders')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representatives');
    }
}
