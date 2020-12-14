<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEducationFormForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_student', function (Blueprint $table) {
            $table->dropForeign('group_student_educational_form_id_foreign');
           $table->dropColumn('educational_form_id');
        });

        Schema::table('programs', function (Blueprint $table) {
            $table->foreignId('educational_form_id');
            $table->foreign('educational_form_id')->references('id')->on('educational_forms')->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->boolean('adaptive');
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
