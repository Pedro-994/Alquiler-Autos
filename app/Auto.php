<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $primaryKey = 'idauto';
    protected $fillable =['matricula','modelo', 'color','kilometraje','seguro','situacion', 'idmarca','idaseguradora','idcategoria','ruta'];
} 