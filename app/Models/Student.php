<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    //
    protected $fillable = [
        'name',
        'registration_number',
        'year_of_study',
        'course_id',
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function results(){
        return $this->hasMany(Results::class);    }

    
}
