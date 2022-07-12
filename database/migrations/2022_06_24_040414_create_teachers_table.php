<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('gender');
            $table->date('birthdate');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->foreignId('major_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
