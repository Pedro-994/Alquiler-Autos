<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'idusuario';
    protected $fillable =['nombre','primerapellido', 'segundoapellido','fechanacimiento','correo','telefono', 'password'];
}
