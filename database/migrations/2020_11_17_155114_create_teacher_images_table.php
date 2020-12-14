<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_images', function (Blueprint $table) {
            $table->id();
            $table->string('path', 500)->nullable(false)->comment('Путь до файла');
            $table->foreignId('teacher_id')->nullable(false)->comment('ID преподавателя');
            $table->string('name', 100)->nullable(false)->comment('Название');
            $table->timestamps();

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
        Schema::dropIfExists('teacher_images');
    }
}
