<?php

namespace App\Http\Controllers;

use App\Certificados;
use Illuminate\Http\Request;
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
        $desde = date('Y-01-01');
        $hasta = date('Y-m-d');

        $desdevencimiento = date('Y-m-d');
        $hastavencimiento = date( "Y-m-d", strtotime( "$desdevencimiento + 7 day"));
        $total_posadas = Certificados::where('localidad','like','Posadas')
        ->whereBetween('fecha', [$desde, $hasta])
        ->count();
        $total_garupa = Certificados::where('localidad','like','Garupa')
        ->whereBetween('fecha', [$desde, $hasta])
        ->count();
        $total_obera = Certificados::where('localidad','like','Obera')
        ->whereBetween('fecha', [$desde, $hasta])
        ->count();
        $total_apostoles = Certificados::where('localidad','like','Apostoles')
        ->whereBetween('fecha', [$desde, $hasta])
        ->count();
        $total_vencer = Certificados::whereBetween('hasta', [$desdevencimiento, $hastavencimiento])
        // ->whereBetween('hasta', [$desdevencimiento, $hastavencimiento])
        ->count();

        if (Auth::user()->nivel == 'cargador'){
            $total_cert = Certificados::where('usuario', '=', Auth::user()->username)
            ->count();
            return view('home', ['total_cert' => $total_cert, 'total_posadas' => $total_posadas, 'total_garupa' => $total_garupa, 'total_obera' => $total_obera, 'total_apostoles' => $total_apostoles, 'total_vencer' => $total_vencer]);
        }
        if (Auth::user()->nivel == 'supervisor'){
             $total_cert = Certificados::where('usuario', '=', Auth::user()->username)
            ->count();
            return view('home', ['total_cert' => $total_cert, 'total_posadas' => $total_posadas, 'total_garupa' => $total_garupa, 'total_obera' => $total_obera, 'total_apostoles' => $total_apostoles, 'total_vencer' => $total_vencer]);

        }
        if (Auth::user()->nivel == 'admin'){
            $total_cert = Certificados::where('usuario', '=', Auth::user()->username)
            ->count();
            $nivel = Auth::user()->nivel;
            return view('home', ['nivel' => $nivel, 'total_cert' => $total_cert, 'total_posadas' => $total_posadas, 'total_garupa' => $total_garupa, 'total_obera' => $total_obera, 'total_apostoles' => $total_apostoles, 'total_vencer' => $total_vencer]);
        }

        
        
        
        
    }
}
