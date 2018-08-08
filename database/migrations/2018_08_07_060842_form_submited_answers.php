<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormSubmitedAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('form_submited_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token');
            $table->unsignedInteger('question_id');
            $table->foreign('question_id')->references('id')->on('form_questions');
            $table->string('answer');
            $table->string('answer_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('form_submited_answers');
    }	
}
