<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
    use HasFactory;

    protected $fillable=['choice','question_id',"is_correct"];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
