<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['Name','LastName','User','Email','Type','Password','ProfPic','LastCnx','ID_Group'];
}