<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Tag;
class QuizController extends Controller
{

    public function index(Request $request) {
      $quiz_id = $request->session()->get('activeQuiz', null);
      if ($quiz_id == null) {
      	return View::make('quiz.startquiz');
      }
      else {
        $quiz = Quiz::find($quiz_id);
        if ($quiz == null) {
          return View::make('quiz.startquiz');
        }
        else {
          $currentQuestionAnswered = $request->session()->get('activeQuestionHasBeenAnswered', false);
          if ($currentQuestionAnswered) {
            $question = $quiz->getNextQuestion();
          }
          else {
            $question = Question::find($quiz->idOfRecentQuestion);
          }
          return View::make('quiz.question')->with('quiz', $quiz)->with('question', $question);
        }
      }
    }

    public function startQuiz(Request $request) {
        $quiz = new Quiz;
        $quiz->save();
        $request->session()->put('activeQuiz', $quiz->id);
      return redirect()->action('Customer\QuizController@index');
    }

    public function answerQuestion(Request $request) {

        $request->session()->put('activeQuestionHasBeenAnswered', true);
        $quiz_id = $request->session()->get('activeQuiz', null);
        $quiz = null;
        if ($quiz_id == null) {
        	$quiz = new Quiz;
          $quiz->save();
          $request->session()->put('activeQuiz', $quiz->id);
        }
        else {
          $quiz = Quiz::find($quiz_id);
        }
        $answer = Answer::find(Input::get('answer_id'));
        $tags = $answer->tags;

        foreach($tags as $key => $value) {
          $quiz->tags()->attach($key);
        }
        $quiz->processTags();

        $result = $quiz->checkForResult();

        if ($result != null) {
          info($result);
          return View::make('quiz.resultpage')->with('restaurant', $restaurant);
        }
        //redirect
        return redirect()->action('Customer\QuizController@index');
    }
}