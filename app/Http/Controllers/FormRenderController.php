<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Session;


class FormRenderController extends Controller
{


    public function renderForm() {

        /* get form questions and answers */
        $questions = DB::table('form_submited_answers')
        ->join('form_questions', 'form_submited_answers.question_id', '=', 'form_questions.id')
        ->where('form_submited_answers.token', Session::getId())
        ->orderBy('form_submited_answers.id', 'ASC')
        ->get();


        return view('Results', compact('questions'));

    }

}