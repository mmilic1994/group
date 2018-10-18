<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
class QuestionController extends Controller
{
   public function index()
   {
    // $question = Question::orderBy('created_at', 'asc')->get();
    
    $view = view('questions/index');

    return $view;
    
   }

   public function show()
   {
    $question =  Question::where('id', 1)->first();
    
    $answers = Answer::where('question_id', 1)->orderBy('created_at', 'asc')->get();
    $answers = $question->answers;

    $view = view('questions/show');
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
