<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends BaseController
{
    public function index()
    {
        return Answer::all();
    }

    public function show(int $id)
    {
        return Answer::find($id);
    }

    public function store(Request $request)
    {
        $answer = new Answer;

        $answer->answer_one = $request->input('answer_one');
        $answer->answer_two = $request->input('answer_two');
        $answer->answer_three = $request->input('answer_three');
        $answer->answer_four = $request->input('answer_four');
        $answer->answer_five = $request->input('answer_five');

        $answer->label = $request->input('label');

        $answer->save();

        return $answer;
    }
}
