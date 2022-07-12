<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class AttendanceStudent extends Model
{
    use HasFactory;
    use HasCompositeKey;

    public $timestamps = false;

    protected $fillable = [
        'attendance_id',
        'student_id',
        'status',
    ];

    protected $primaryKey = ['attendance_id', 'student_id'];
}
