<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['title'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
