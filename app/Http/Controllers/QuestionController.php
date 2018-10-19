<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
class QuestionController extends Controller
{
   public function index()
   {
    $question = Question::orderBy('created_at', 'asc')->get();
    // dd($question);

    $view = view('questions/index', [
        'questions' => $question
    ]);

    return $view;
    
   }

   public function show($id)
   {
    $question =  Question::findOrFail($id);
    
    $answers = Answer::where('question_id', $id)->orderBy('created_at', 'asc')->get();
    $answers = $question->answers;

    $view = view('questions/show', [
        'questions' => $question,
        'answers' => $answers
    ]);
    return $view;
    
   }

   public function form() {
    
    $form = view("questions/form/form");

    $wrapper = view("questions/form/wrapper", [
      "content" => $form
    ]);
    
    return $wrapper;


   }
}
