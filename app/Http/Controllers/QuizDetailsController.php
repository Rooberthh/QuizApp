<?php


    namespace App\Http\Controllers;


    use App\Answer;
    use App\Question;
    use App\Quiz;
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

            $allQuestions = Question::all();

            $allCorrectAnswers = Answer::all()->where('correct', true)->groupBy('question_id');
            $correctUserAnswers = Answer::find($answerIds)->where('correct', true)->groupBy('question_id');

            // Calculate amount of corrects
            $points = 0;
            foreach($allCorrectAnswers as $index => $answers) {
                if($correctUserAnswers[$index] == $answers){
                    $points++;
                }
            }

            Quiz::create([
                'name' => $request->name,
                'email' => $request->email,
                'result' => $points
            ]);

            //redirect to quizResults

            return view('quiz.results', [
                                                'points' => $points,
                                                'allQuestions' => $allQuestions,
                                                'userAnswersIds' => $answerIds
                                            ]);
        }
    }
