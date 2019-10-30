<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use DB;

class marcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::paginate(8);
        return view("/marcas.index",compact("marcas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conteo = DB::table('marcas')->count();
        if(!$conteo){
            $conteo = $conteo+1;
            return view('marcas.create')  
            ->with('conteo',$conteo); 
        }
        $consulta = Marca::orderby('idmarca','desc')
        ->take(1) 
        ->get();
        $conteo =$consulta[0]->idmarca +1;
        return view('marcas.create')
        ->with('conteo',$conteo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,0-9, ]*$/']]);
        $marca = new Marca;
        $marca -> nombre = $request -> nombre;
        $marca -> save();
        return view('marcas.insert');
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
        return view('marcas.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('marcas.delete');
    }
}
