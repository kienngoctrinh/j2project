<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('gender');
            $table->date('birthdate');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->foreignId('classs_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
