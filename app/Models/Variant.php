<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    //вторичный ключ для ассоциации с таблицой с вопроса
    public function question()
    {
        return $this->belongsTo('App\Models\Question', 'question_id');
    }

}
