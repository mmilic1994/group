<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AnswerController extends Controller
{
    public function show($id) {
        $answer = Answer::find($id);

        return view('answers/show', compact('answer'));
    }

    public function vote($id) {
        $request = request();
        
        $answer = Answer::findOrFail($id);
        
        $vote = new \App\Vote;
        $vote->answer_id = $answer->id;
        
        if ($request->input('up')) {
            $vote->vote = 1;
            $answer->rating++; 
        } elseif($request->input('down')) {
            $vote->vote = -1;
            $answer->rating--; 
        }

        $vote->save();
        $answer->save();

        return back();
    }
}
