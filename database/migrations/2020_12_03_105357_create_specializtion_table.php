<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecializtionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specializations', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable(false);
            $table->foreignId('course_id');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('groups', function (Blueprint $table) {
           $table->dropConstrainedForeignId('course_id');
           $table->foreignId('specialization_id');

           $table->foreign('specialization_id')->references('id')->on('specializations')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specializtion');
    }
}
