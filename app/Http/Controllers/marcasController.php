<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use DB;

class marcasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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
        return back()->with('create','Marca creada correctamente');
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
        $marca = Marca::findOrFail($id);
        return view('marcas.edit',compact('marca'));
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
        $this->validate($request, ['nombre'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,0-9, ]*$/']]);
        $marca = Marca::findOrFail($id);  
        $marca-> update($request->all()); 
        return back()->with('update','Marca actualizado correctamente');
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
        $marca = Marca::findOrFail($id);
        $marca -> delete();
        return back()->with('eliminar','Elemento eliminado exitosamente');
    }
}
