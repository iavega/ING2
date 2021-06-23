<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class loginController extends Controller
{
  public function index()
  {
    return view('Login.index');
  }
  public function verificarlogin(request $request)
  {
    $data = $request->all();
    $data_user = \App\Models\User::where('User','=',$data['user'])->first();
    if(($data_user['User'] == $data['user']) && (password_verify($data['passwd'],$data_user['Password'])))
    {
      return "user valido";
    }
      return back()->with('error','El usuario o la contraseña son invalidos');
  }
  public function registrarse(){
    $list_group = \App\Models\Group::all()->pluck('ID_Group','ID_Group');
    return view('Registro.index',compact('list_group'));
  }
  public function registrarse_save(request $request){
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
    return redirect()->action('App\Http\Controllers\loginController@index')->with('successful','El usuario se registro correctamente');;
  }
  public function recuperar(){
    return view('Login.recuperar');
  }
  public function recuperar_process(request $request){
    $data = $request->all();
    // $data_user = \App\Models\User::where('Email','=',$data['Email'])->first();
    // if ($data_user['Email'] == $data['Email']){

    // }
    $to_name = 'vega';
    $to_email = 'vegaiam11@gmail.com';
    $data = array('name'=>"Sam Jose", "body" => "Test mail");

    Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
                ->subject('Artisans Web Testing Mail');
        $message->from('FROM_EMAIL_ADDRESS','Artisans Web');
    });
    return redirect()->action('App\Http\Controllers\loginController@index')->with('successful','El ha enviado un correo para restaurar la contraseña');
  }
}