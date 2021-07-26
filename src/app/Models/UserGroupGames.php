<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroupGames extends Model
{
    use HasFactory;
    protected $table = 'usuario_grupo_juego';
    protected $fillable = ['ID_usuario','ID_juego','ID_grupo','username','psswd','score','coins','foto_perfil','status','first_reg','last_reg'];
}