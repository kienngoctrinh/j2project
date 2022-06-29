<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('number_lesson');
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('classs_id')->constrained();
            $table->foreignId('teacher_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
