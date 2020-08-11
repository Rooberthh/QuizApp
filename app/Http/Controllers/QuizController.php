<?php

namespace App\Http\Controllers;

use App\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        if((int)session('lastPage') + 1 == (int)$request->query('page')){
            $passed = (session("start_time") > Carbon::now()->subMinutes(Config('timelimit.minutes')));

            return view('quiz.details', compact('passed', $passed));
        }

        if(session('page') == 0) {
            session(['start_time' => Carbon::now()]);
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

        $page = (int)session('page');
        $page++;
        session(['page' => $page]);

        return redirect()->route('quiz.index', ['page' => session('page')]);
    }

}
