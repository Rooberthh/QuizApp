<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['title', 'correct'];

    protected $casts = [
        'correct' => 'boolean'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
