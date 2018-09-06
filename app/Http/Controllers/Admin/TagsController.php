<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Question;
use App\Models\Restaurant;
use App\Models\Answer;
use App\Models\Tag;

class TagsController extends Controller
{

    /**
        Checks if they're a logged in customer
    */
    private function checkAuth() {
        if(\Auth::check() && !(\Auth::user()->isAdmin()) ) {
           return true;
        }
        return false;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function answerTagIndex($question_id, $answer_id)
    {
        if ($this->checkAuth()) {
            return redirect('/home');
        }
        $question = Question::find($question_id);
        $answer = Answer::find($answer_id);
        $answerTags = $answer->tags; // only tags for this answer
        $completeTagList = Tag::All();
        return View::make('admin.question.answer.tag.index')->with('question', $question)->with('answer', $answer)->with('answerTags', $answerTags)->with('completeTagList', $completeTagList); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restaurantTagIndex($restaurant_id)
    {
        if ($this->checkAuth()) {
            return redirect('/home');
        }
        $restaurant = Restaurant::find($restaurant_id);
        $restaurantTags = $answer->tags; // only tags for this answer
        $completeTagList = Tag::All();
        return View::make('restaurants.tags.index')->with('restaurant', $restaurant)->with('restaurantTags', $restaurantTags)->with('completeTagList', $completeTagList); 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}