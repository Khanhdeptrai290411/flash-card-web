<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'course_id';
    protected $fillable = [
        'user_id',	'title'	,'description',	'nameschool',	'namecourse'
    ];
    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'course_id', 'course_id');
    }
}
