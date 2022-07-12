<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorsTable extends Migration
{
    public function up()
    {
        Schema::create('majors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('academic_year_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('majors');
    }
}
