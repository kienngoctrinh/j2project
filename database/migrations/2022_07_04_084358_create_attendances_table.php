<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->foreignId('slot_id')->constrained();
            $table->foreignId('student_id')->constrained();
            $table->smallInteger('status')->comment('AttendanceStatusEnum');
            $table->primary(['slot_id', 'student_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
