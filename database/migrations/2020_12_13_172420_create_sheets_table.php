<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quarters', function (Blueprint $table){
           $table->id();
           $table->string('name');
           $table->timestamps();
        });
        Schema::create('sheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('quarter_id');
            $table->integer('year');
            $table->foreignId('subject_id');
            $table->tinyInteger('mark');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('subject_id')->references('id')->on('subjects')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('quarter_id')->references('id')->on('quarters')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sheets');
    }
}
