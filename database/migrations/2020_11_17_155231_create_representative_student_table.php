<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentativeStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representative_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable(false)->comment('ID студента');
            $table->foreignId('representative_id')->nullable(false)->comment('ID представителя');
            $table->timestamps();


            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('representative_id')->references('id')->on('representatives')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representative_student');
    }
}
