<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_teacher', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->comment('ID группы');
            $table->foreignId('teacher_id')->comment('ID преподавателя');
            $table->timestamps();

            $table->foreign('group_id')->references('id')->on('groups')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('teacher_id')->references('id')->on('teachers')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_teacher');
    }
}
