<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    //

    protected $fillable = [
        'name',
        'code',
        'course_id',
    ];
    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function results(){
        return $this->hasMany(Results::class);
    }
}
