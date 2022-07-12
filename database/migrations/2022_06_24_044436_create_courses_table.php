<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('major_id')->constrained();
            $table->foreignId('academic_year_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
