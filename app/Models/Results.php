<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Subjects;

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

    public function user(){
        return $this->belongsTo(User::class);
    }

   
}
