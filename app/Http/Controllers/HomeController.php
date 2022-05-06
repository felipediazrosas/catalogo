<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciudades;
use App\Models\Productos;

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
    public function gmaps($producto_id = 0)
    {
        //dd($producto_id);
    	//$locations = DB::table('ciudades')->get();
    	//$locations = Ciudad::with('productos')->get();
        if ($producto_id != 0){
            $locations='';
            $producto = Productos::where('id', $producto_id)->with('allCiudades')->first();
            $locations = $producto->allCiudades;
            return view('gmaps',compact('locations', 'producto'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
