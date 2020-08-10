<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $questions = Question::all()->paginate(3);

        return view('quiz.index', ['questions' => $questions]);
    }

}
