<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable=['question','type_id','speciality_id','explanation'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }

    public function choices()
    {
        return $this->hasMany(QuestionChoice::class);
    }
}
