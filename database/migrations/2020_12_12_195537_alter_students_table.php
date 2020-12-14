<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function(Blueprint $table) {
           $table->foreignId('disability_id')->nullable(true);
           $table->foreign('disability_id')->references('id')->on('disabilities')->nullOnDelete();
           $table->boolean('no_reps')->nullable(true);
           $table->boolean('low_money')->nullable(true);
           $table->boolean('migrant')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
