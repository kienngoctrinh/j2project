<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'slot',
        'teacher_id',
        'course_id',
        'subject_id',
        'date',
    ];
}
