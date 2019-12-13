<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $primaryKey = 'idcategoria';
    protected $fillable = ['nombre','descripcion'];
}
