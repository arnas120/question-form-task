<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use ImageUploader;

class FormProcessingController extends Controller
{

    /**
     * Submit question form.
     *
     * @param  Request  $request
     * @return Response
     */
    public function submitForm(Request $request) {

        $request->validate([
            'foto' => 'nullable|image|max:500',
            'yname' => 'required',
            'birthYears' => 'required',
            'birthMonth' => 'required',
            'birthDays' => 'required',
            'gender' => 'required',
            'intProgramming' => 'required',
            'langs' => 'nullable',
        ]);

        /* form is validated - continue */
        if($request->hasFile('foto')){

         $imageExtension = $request->foto->getClientOriginalExtension(); //file extension
         $imageContent = $request->foto; //image content

         /* Upload image */
         
         $imageName = ImageUploader::saveImage($imageContent, $imageExtension);
         
            //store data to database
            DB::table('form_submited_answers')->insert([
                [
                    'token' => Session::getId(), 
                    'question_id' => 1,
                    'answer' => $request->yname,
                    'answer_type' => 'text',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'token' => Session::getId(), 
                    'question_id' => 2,
                    'answer' => $request->birthYears.'-'.$request->birthMonth.'-'.$request->birthDays,
                    'answer_type' => 'text',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'token' => Session::getId(), 
                    'question_id' => 3,
                    'answer' => $request->gender,
                    'answer_type' => 'text',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'token' => Session::getId(), 
                    'question_id' => 4,
                    'answer' => $request->intProgramming,
                    'answer_type' => 'text',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'token' => Session::getId(), 
                    'question_id' => 5,
                    'answer' => json_encode($request->langs),
                    'answer_type' => 'array',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'token' => Session::getId(), 
                    'question_id' => 6,
                    'answer' => $imageName,
                    'answer_type' => 'image',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
        else {
            DB::table('form_submited_answers')->insert([
                [
                    'token' => Session::getId(), 
                    'question_id' => 1,
                    'answer' => $request->yname,
                    'answer_type' => 'text',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'token' => Session::getId(), 
                    'question_id' => 2,
                    'answer' => $request->birthYears.'-'.$request->birthMonth.'-'.$request->birthDays,
                    'answer_type' => 'text',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'token' => Session::getId(), 
                    'question_id' => 3,
                    'answer' => $request->gender,
                    'answer_type' => 'text',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'token' => Session::getId(), 
                    'question_id' => 4,
                    'answer' => $request->intProgramming,
                    'answer_type' => 'text',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'token' => Session::getId(), 
                    'question_id' => 5,
                    'answer' => json_encode($request->langs),
                    'answer_type' => 'array',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }



        return redirect('/');
    }

}