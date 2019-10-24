<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use DB;

class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view("usuarios.index",compact("usuarios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conteo = DB::table('usuarios')->count();
        if(!$conteo){
            $conteo = $conteo+1;
            return view('usuarios.create')  
            ->with('conteo',$conteo); 
        }
        $consulta = Usuario::orderby('idusuario','desc')
        ->take(1) 
        ->get();
        $conteo =$consulta[0]->idusuario +1;
    return view('usuarios.create')
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
        $this->validate($request, ['nombre'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú, ]*$/'],
                                    'primerapellido'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú, ]*$/'],
                                    'segundoapellido'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú, ]*$/'],
                                    'fechanacimiento'=>'required',
                                    'correo'=>['regex:/^[A-Za-z,á,é,í,ó,ú][A-Za-z,á,é,í,ó,ú,0-9]*[@][A-Za-z,á,é,í,ó,ú][A-Z,a-z,á,é,í,ó,ú]*[.][a-z][a-z][a-z]*$/'],
                                    'telefono'=>['regex:/^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/'],
                                    'password' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*.-]).{6,}$/']);
                                    
        $usuario = new Usuario;
        $usuario -> nombre = $request-> nombre;
        $usuario -> primerapellido = $request -> primerapellido;
        $usuario -> segundoapellido = $request -> segundoapellido;
        $usuario -> fechanacimiento = $request -> fechanacimiento;
        $usuario -> correo = $request -> correo;
        $usuario -> telefono = $request -> telefono;
        $usuario -> password = $request -> password;
        $usuario -> save();
        return view('usuarios.insert');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show',compact('usuario'));
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
        return view('usuarios.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('usuarios.delete');
    }
}
