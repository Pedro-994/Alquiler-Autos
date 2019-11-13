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
        ->select('autos.*', 'aseguradoras.nombre AS aseguradora', 'marcas.nombre AS marca','categorias.nombre AS categoria')->paginate(8);
       return view("autos.index",compact("autos"));

    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conteo = DB::table('autos')->count();
        $marcas = Marca::orderby('nombre','ASC')->get();
        $aseguradoras = Aseguradora::orderby('nombre','ASC')->get();
        $categorias = Categoria::orderby('nombre','ASC')->get();
        if(!$conteo){
            $conteo = $conteo+1;
            return view('autos.create')  
            ->with('conteo',$conteo)
            ->with('marcas',$marcas)
            ->with('aseguradoras',$aseguradoras)
            ->with('categorias',$categorias);
        }
        $consulta = Auto::orderby('idauto','desc')
        ->take(1) 
        ->get();
        $conteo =$consulta[0]->idauto +1;
        return view('autos.create')
        ->with('conteo',$conteo)
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
                                    'situacion'=>'required',                            'idmarca' =>'required',
                                    'idaseguradora' =>'required',
                                    'idcategoria' =>'required'
                                    ]);
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
        return back()->with('create','Auto creado correctamente');
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
        $marcas = Marca::orderby('nombre','ASC')->get();
        $aseguradoras = Aseguradora::orderby('nombre','ASC')->get();
        $categorias = Categoria::orderby('nombre','ASC')->get();
        $auto = Auto::findOrFail($id);
        return view('autos.edit',compact('auto'))
        ->with('marcas',$marcas)
        ->with('aseguradoras',$aseguradoras)
        ->with('categorias',$categorias);
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
        $this->validate($request, ['matricula'=>['regex:/^[A-Z,0-9,-]*$/'],
        'modelo'=>'required',
        'color'=>'required',
        'kilometraje'=>'required',
        'seguro' => 'required',
        'situacion'=>'required',                            
        'idmarca' =>'required',
        'idaseguradora' =>'required',
        'idcategoria' =>'required'
        ]);
        $auto = Auto::findOrFail($id);
        $auto-> update($request->all()); 
        return back()->with('update','Auto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auto = Auto::findOrFail($id);
        $auto -> delete();
        return back()->with('eliminar','Elemento eliminado exitosamente');
    }
}
