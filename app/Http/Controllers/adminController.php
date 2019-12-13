<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auto;
use App\Marca;
use App\Aseguradora;
use App\Categoria;
use App\Usuarios;
use DB;

class adminController extends Controller
{
    public function index()
    {

        $autos = DB::table('autos')->count(); 
        $marcas = DB::table('marcas')->count();
        $categorias = DB::table('categorias')->count();
        $usuarios = DB::table('usuarios')->count(); 
        $aseguradoras = Db::table('aseguradoras')->count(); 

        return view('adminHome')
        ->with('autos',$autos)
        ->with('marcas',$marcas)
        ->with('aseguradoras',$aseguradoras)
        ->with('categorias',$categorias)
        ->with('usuarios',$usuarios);
    }
}
