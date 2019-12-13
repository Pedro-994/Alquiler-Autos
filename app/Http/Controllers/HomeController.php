<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $autos = DB::table('autos')->count(); 
        $marcas = DB::table('marcas')->count();
        $categorias = DB::table('categorias')->count();
        $usuarios = DB::table('usuarios')->count(); 
        $aseguradoras = Db::table('aseguradoras')->count(); 
        
        $user = Auth::user();
        return view('adminHome')
        ->with('autos',$autos)
        ->with('marcas',$marcas)
        ->with('aseguradoras',$aseguradoras)
        ->with('categorias',$categorias)
        ->with('usuarios',$usuarios);
    }
}
