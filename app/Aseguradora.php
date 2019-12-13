<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aseguradora extends Model
{
    protected $primaryKey = 'idaseguradora';
    protected $fillable = ['nombre','tipoAseguradora','idmarca'];
}
