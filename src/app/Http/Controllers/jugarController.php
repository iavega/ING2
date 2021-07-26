<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;
class usuarioController extends Controller
{
  public function get_questions(request $request)
  {
    $data = $request->all();
    $data_user = \App\Models\User::where('User','=',$data['user'])->first();
    if(($data_user['User'] == $data['user']) && (password_verify($data['passwd'],$data_user['Password'])))
    {
      return $this->respondWithToken(auth()->login($data_user));
    }
    return response()->json(['error' => 'Unauthorized'], 401);
  }
}