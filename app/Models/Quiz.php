<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Trong file Quiz.php

class Quiz extends Model
{
    protected $table = 'quizzes';
    protected $primaryKey = 'quizzes_id	';
    protected $fillable = [
        'user_id',
        'course_id'	,'definition',	'mota'	,'image'
    ];
}
