<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'gender',
        'birthdate',
        'address',
        'email',
        'phone',
        'classs_id',
    ];

    public function getGenderNameAttribute()
    {
        return ($this->gender === 0) ? 'Female' : 'Male';
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
