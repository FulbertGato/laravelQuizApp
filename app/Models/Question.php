<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'type_id'];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function reponses()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }
}
