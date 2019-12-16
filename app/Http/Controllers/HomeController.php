<?php

namespace App\Http\Controllers;

use App\Auto;
use App\Slider;
use Illuminate\Http\Request;

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
        
        $sliders= Slider::paginate(3);
        $autos= Auto::paginate(8);

        foreach($sliders as $slider){
            if($slider->id==1)
            $s1=$slider->ruta;
            else if($slider->id==2)
            $s2=$slider->ruta;
            else
            $s3=$slider->ruta;
        }

        return view('principal',compact('s1','s2','s3','autos'));
    }

    public function contacto(){

        return view('contacto');
    }
}
