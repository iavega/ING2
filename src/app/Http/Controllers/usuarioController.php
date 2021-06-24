<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;
class usuarioController extends Controller
{
  public function loginIndex()
  {
    return view('Login.index');
  }
  public function verificarLogin(request $request)
  {
    $data = $request->all();
    $data_user = \App\Models\User::where('User','=',$data['user'])->first();
    if(($data_user['User'] == $data['user']) && (password_verify($data['passwd'],$data_user['Password'])))
    {
      session(['userID'=>$data_user['id']]);
      session(['userName'=>$data_user['User']]);
      session(['login'=>True]);
      return redirect()->route('dahsboard');

    }
    return back()->with('error','El usuario o la contraseña son invalidos');
  }
  public function registrarseIndex(){
    $list_group = \App\Models\Group::all()->pluck('ID_Group','ID_Group');
    return view('Registro.index',compact('list_group'));
  }
  public function registrarseGuardar(request $request){
    $data = $request->all();
    $data['Type'] = 1;
    $validation_data = Validator::make($data,[
        'User'=> 'required|unique:users',
        'Email'=> 'required|unique:users'
    ],[
      'User.required'=> 'El campo es obligatorio',
      'User.unique' => 'El Usuario ingresado ya existe',
      'Email.required'=> 'El campo es obligatorio',
      'Email.unique' => 'El Correo ingresado ya existe'
    ]);
    if($validation_data->fails()){
      return back()->withErrors($validation_data)->withInput();
    }
    $data['Password'] = bcrypt($data['Password']);
    \App\Models\User::create($data);
    return redirect()->action('App\Http\Controllers\usuarioController@index')->with('successful','El usuario se registro correctamente');;
  }
  public function recuperarIndex(){
    return view('Login.recuperar');
  }
  public function recuperarContrasena(request $request){
    $data = $request->all();
    $data_user = \App\Models\User::where('Email','=',$data['Email'])->first();
    if ($data_user['Email'] == $data['Email']){
      $mailData = [
        'title' => 'Restablecer la contraseña',
        'url' => ''
      ];
      Mail::to($data['Email'])->send(new EmailDemo($mailData));
    }
    return redirect()->action('App\Http\Controllers\usuarioController@index')->with('successful','El ha enviado un correo para restaurar la contraseña');
  }
  public function logoutAction(){
    session(['login' => false]);
    return redirect()->action('App\Http\Controllers\usuarioController@loginIndex');
  }
}