<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        'name',
        'code',
    ];

    public function subjects(){
        return $this->hasMany(Subjects::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }   
}
