<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    //
    protected $fillable = [
        'student_id',
        'subject_id',
        'grade',
        'marks',
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function subject(){
        return $this->belongsTo(Subjects::class);
    }
}
