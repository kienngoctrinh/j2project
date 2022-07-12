<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('slot')->comment('SlotSlotEnum');
            $table->foreignId('teacher_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('course_id')->constrained();
            $table->date('date');
            $table->unique(['slot', 'subject_id', 'course_id', 'date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
