<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;
class jugarController extends Controller
{
  public function get_questions()
  {
    $dataQuestions = \App\Models\Questions::first();
    $dataAnswer =  \App\Models\Answers::where('ID_Question','=',$dataQuestions->ID_Question)->get();
    $dataQuestions['Answer'] = $dataAnswer;
    return response()->json($dataQuestions, 200);
  }
}