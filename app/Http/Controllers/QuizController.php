<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        if((int)session('page') > (int)session('lastPage')){
            return view('quiz.details');
        }

        if(session('page') == 0) {
            session(['page' => 1]);
            $lastPage = Question::all()->count() / config('pagination.questions');
            session(['lastPage' => $lastPage]);
        } else {
            session(['page' => (int)$request->query('page')]);
        }

        $page = session('page');
        $offset = ($page - 1) * config('pagination.questions');

        $questions = Question::skip($offset)->take(3)->get();

        session(['questions' => $questions]);

        return view('quiz.index', ['questions' => $questions]);
    }

    public function store(Request $request)
    {
        $questions = session('questions')->pluck('title');
        $fields = [];
        foreach($questions as $question) {
            $fields[$question] = 'required';
        };
        $this->validate($request, $fields);

        if(!! session('answers')) {
            $oldAnswers = collect(session('answers'));
            $newAnswers = $oldAnswers->merge($request->all());
            session(['answers' => $newAnswers]);
        } else {
            session(['answers' => $request->all()]);
        }

        $val = (int)session('page');
        $val++;
        session(['page' => $val]);
        $page = session('page');

        return redirect()->route('quiz.index', ['page' => $page]);
    }

}
