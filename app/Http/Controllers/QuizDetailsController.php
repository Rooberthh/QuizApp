<?php


    namespace App\Http\Controllers;


    use App\Answer;
    use Illuminate\Http\Request;

    class QuizDetailsController extends Controller
    {
        public function store(Request $request)
        {
            $this->validate($request, [
                'email' => 'required|min:5',
                'name' => 'required|min:5'
            ]);

            $answers = session('answers');
            $answerIds = [];
            foreach($answers as $question) {
                if(is_array($question)) {
                    foreach($question as $answer => $value) {
                        $answerIds[] = $value;
                    }
                }
            }

            $useranswers = Answer::find($answerIds);
            $allanswers = Answer::all();


            // Calculate amount of corrects
            // Insert into Quizzes

            //redirect to quizResults

            return view('quiz.results', ['points' => 0]);
        }
    }
