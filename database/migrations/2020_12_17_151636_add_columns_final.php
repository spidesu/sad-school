<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsFinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_sheet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sheet_id')->nullable(true);
            $table->foreignId('department_id')->nullable(true);
            $table->foreignId('student_id')->nullable(true);

            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('sheet_id')->references('id')->on('sheets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('student_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('teacher_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('ends', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();

        });
        Schema::table('subjects', function (Blueprint $table) {
           $table->boolean('active')->nullable(true);
        });
        Schema::table('students', function (Blueprint $table) {
           $table->timestamp('begin_at')->nullable(true);
           $table->string('begin_doc_number', 225)->nullable(true);
           $table->timestamp('end_at')->nullable(true);
           $table->string('end_doc_number', 225)->nullable(true);
           $table->foreignId('end_id')->nullable(true);
           $table->string('end_number', 225)->nullable(true);
           $table->foreignId('status_id')->nullable(true);
           $table->string('snils', 50)->nullable(true);
           $table->string('document_number',50)->nullable(true);

           $table->foreign('end_id')->references('id')->on('ends')->cascadeOnUpdate()->cascadeOnDelete();
           $table->foreign('status_id')->references('id')->on('student_statuses')->cascadeOnDelete()->cascadeOnUpdate();
        });
        Schema::create('positions', function(Blueprint $table) {
           $table->id();
           $table->string('name', 100);
           $table->timestamps();
        });
        Schema::table('teachers', function (Blueprint $table) {
           $table->string('education_name', 100)->nullable(true);
           $table->foreignId('status_id')->nullable(true);
           $table->timestamp('begin_at')->nullable(true);
           $table->timestamp('end_at')->nullable(true);
           $table->boolean('parttime_work')->nullable(true)->change();
           $table->foreignId('position_id')->nullable(true);

           $table->foreign('status_id')->references('id')->on('teacher_statuses')->cascadeOnUpdate()->cascadeOnDelete();
           $table->foreign('position_id')->references('id')->on('positions')->cascadeOnDelete()->cascadeOnUpdate();
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
