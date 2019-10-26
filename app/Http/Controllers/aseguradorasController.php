<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aseguradora;
use App\Marca;
use DB;

class aseguradorasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $aseguradoras = DB::table('aseguradoras')
        ->join('marcas', 'aseguradoras.idmarca', '=', 'marcas.idmarca')
        ->select('aseguradoras.*', 'marcas.nombre AS marca')
        ->get();
        return view("aseguradoras.index",compact("aseguradoras"));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conteo = DB::table('aseguradoras')->count();
        $marcas = Marca::orderby('nombre','ASC')->get();
        if(!$conteo){
            $conteo = $conteo+1;
            return view('aseguradoras.create')  
            ->with('conteo',$conteo) 
            ->with('marcas',$marcas);
        }
        $consulta = Aseguradora::orderby('idaseguradora','desc')
        ->take(1) 
        ->get();
        $idsigue =$consulta[0]->idaseguradora +1;
    return view('aseguradoras.create')
    ->with('idsigue',$idsigue)
    ->with('marcas',$marcas);

    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú, ]*$/'],
                                    'tipoAseguradora'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú, ]*$/'],]);

        $aseguradora = new Aseguradora;
        $aseguradora -> nombre = $request -> nombre;
        $aseguradora -> tipoAseguradora = $request -> tipoAseguradora;
        $aseguradora -> idmarca = $request -> idmarca;
        $aseguradora -> save();
        return view('aseguradoras.insert');
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
        return view('aseguradoras.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('aseguradoras.delete');
    }
}
