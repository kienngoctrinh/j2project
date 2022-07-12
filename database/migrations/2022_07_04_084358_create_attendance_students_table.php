<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('attendance_students', function (Blueprint $table) {
            $table->foreignId('attendance_id')->constrained();
            $table->foreignId('student_id')->constrained();
            $table->smallInteger('status')->comment('AttendanceStudentStatusEnum');
            $table->primary(['attendance_id', 'student_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance_students');
    }
}
