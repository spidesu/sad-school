<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function(Blueprint $table) {
           $table->id();
           $table->string('name', 100);
           $table->timestamps();
        });

        Schema::table('teachers', function(Blueprint $table) {
            $table->dropColumn('education');
            $table->foreignId('education_id')->nullable(true)->comment('id образования');
            $table->foreign('education_id')->on('educations')->references('id');
            $table->date('work_since')->nullable(true)->comment('Работа преподавателем с');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
