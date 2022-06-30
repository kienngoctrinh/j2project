<?php

namespace App\Models;

use App\Enums\SlotSlotEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'slot',
        'teacher_id',
        'subject_id',
        'classs_id',
        'date',
    ];

    public function getSlotNameAttribute()
    {
        return SlotSlotEnum::getKey($this->slot);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function getTeacherNameAttribute()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function getSubjectNameAttribute()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classs()
    {
        return $this->belongsTo(Classs::class);
    }

    public function getClasssNameAttribute()
    {
        return $this->belongsTo(Classs::class);
    }
}
