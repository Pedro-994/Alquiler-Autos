<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use DB;

class categoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view("categorias.index",compact("categorias"));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conteo = DB::table('categorias')->count();
        if(!$conteo){
            $conteo = $conteo+1;
            return view('categorias.create')  
            ->with('conteo',$conteo); 
        }
        $consulta = Categoria::orderby('idcategoria','desc')
        ->take(1) 
        ->get();
        $conteo =$consulta[0]->idcategoria +1;
        return view('categorias.create')
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
        $this->validate($request, ['nombre'=>'required',
        'descripcion'=>'required']);
        $categoria = new Categoria;
        $categoria -> nombre = $request -> nombre;
        $categoria -> descripcion = $request -> descripcion;
        $categoria -> save();
        return back()->with('create','Categoria creada correctamente');

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
        return view('categorias.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('categorias.delete');
    }
}
