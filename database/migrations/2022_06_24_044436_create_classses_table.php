<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasssesTable extends Migration
{
    public function up()
    {
        Schema::create('classses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('major_id')->constrained();
            $table->foreignId('course_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('classses');
    }
}
