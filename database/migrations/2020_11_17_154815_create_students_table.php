<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('last_name', 100)->nullable(false)->comment('Фамилия');
            $table->string('first_name', 100)->nullable(false)->comment('Имя');
            $table->string('middle_name', 100)->nullable(false)->comment('Отчество');
            $table->foreignId('gender_id')->nullable()->comment('ID пола');
            $table->date('birth_date')->nullable()->comment('Дата рождения');
            $table->foreignId('health_group_id')->nullable()->comment('ID группы здоровья');
            $table->boolean('medical_doc_fact')->nullable()->comment('Факт наличия медицинской справки')->default(false);
            $table->string('address_act', 500)->nullable()->comment('Адрес фактического проживания');
            $table->string('address_reg', 500)->nullable()->comment('Адрес регистрации');
            $table->text('comment')->nullable()->comment('Особые отметки');

            $table->foreign('gender_id')->references('id')->on('genders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('health_group_id')->references('id')->on('health_groups')->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
