<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auto;
use App\Marca;
use App\Aseguradora;
use App\Categoria;
use DB;

class autosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autos = DB::table('autos')
        ->join('aseguradoras', 'autos.idaseguradora', '=', 'aseguradoras.idaseguradora')
        ->join('marcas', 'autos.idmarca', '=', 'marcas.idmarca')
        ->join('categorias', 'autos.idcategoria', '=', 'categorias.idcategoria')
        ->select('autos.*', 'aseguradoras.nombre AS aseguradora', 'marcas.nombre AS marca','categorias.nombre AS categoria')
        ->get();
       return view("autos.index",compact("autos"));

    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consulta = Auto::orderby('idauto','desc')
        ->take(1) 
        ->get();
        $marcas = Marca::orderby('nombre','ASC')->get();
        $aseguradoras = Aseguradora::orderby('nombre','ASC')->get();
        $categorias = Categoria::orderby('nombre','ASC')->get();
        $idsigue =$consulta[0]->idauto +1;
    return view('autos.create')
    ->with('idsigue',$idsigue)
    ->with('marcas',$marcas)
    ->with('aseguradoras',$aseguradoras)
    ->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['matricula'=>['regex:/^[A-Z,0-9,-]*$/'],
                                    'modelo'=>'required',
                                    'color'=>'required',
                                    'kilometraje'=>'required',
                                    'seguro' => 'required',
                                    'situacion'=>'required']);
        $auto = new Auto;
        $auto -> matricula = $request-> matricula;
        $auto -> modelo = $request -> modelo;
        $auto -> color = $request -> color;
        $auto -> kilometraje = $request -> kilometraje;
        $auto -> seguro = $request -> seguro;
        $auto -> situacion = $request -> situacion;
        $auto -> idmarca = $request -> idmarca;
        $auto -> idaseguradora = $request -> idaseguradora;
        $auto -> idcategoria = $request -> idcategoria;
        $auto->save();  
        return view('autos.insert'); 
    }
 
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('autos.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('autos.delete');
    }
}