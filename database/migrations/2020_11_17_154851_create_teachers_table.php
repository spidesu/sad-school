<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 100)->nullable(false)->comment('Фамилия');
            $table->string('first_name', 100)->nullable(false)->comment('Имя');
            $table->string('middle_name', 100)->nullable(false)->comment('Отчество');
            $table->string('education', 500)->nullable()->comment('Образование');
            $table->string('speciality',500)->nullable()->comment('Специальность');
            $table->foreignId('disability_id')->nullable()->comment('ID инвалидности');
            $table->string('parttime_work', 500)->nullable()->comment('Работа по совместительству');
            $table->float('working_rate')->nullable()->comment('Количество ставок');
            $table->string('phone', 12)->nullable()->comment('Телефон');
            $table->string('address_reg', 500)->nullable()->comment('Адрес регистрации');
            $table->string('address_act', 500)->nullable()->comment('Адрес фактического проживания');
            $table->foreignId('gender_id')->nullable()->comment('ID пола');

            $table->foreign('disability_id')->references('id')->on('disabilities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('gender_id')->references('id')->on('genders')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('teachers');
    }
}
