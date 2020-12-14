<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable(false)->comment('ID ученика');
            $table->foreignId('group_id')->nullable(false)->comment('ID группы');
            $table->foreignId('educational_form_id')->nullable(false)->comment('ID формы обучения');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('group_id')->references('id')->on('groups')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('educational_form_id')->references('id')->on('educational_forms')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_student');
    }
}
