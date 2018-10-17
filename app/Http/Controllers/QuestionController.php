<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
   public function index()
   {
    $questions = DB::table('questions')
        // ->where('questions_id', 1)
        // ->orderBy('created_at', 'asc')
        // ->get();
        
    dd($questions);

    return 'This is the list of questions';
   }

   public function show()
   {
    $question = DB::table('questions')
        ->where('id', 1)
        ->first();

    $answers = DB::table('answers')
        ->where('questions_id', 1)
        ->orderBy('created_at', 'asc')
        ->get();
    return 'This is a detail of a question';
    
   }
}
