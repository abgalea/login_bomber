<?php

namespace App\Http\Controllers;

use App\Certificados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificadoController extends Controller
{
    public function index(Request $request)
    {
        $query = trim($request->get('search'));
        
        if (Auth::user()->nivel == 'cargador'){
            $certificados = Certificados::where('usuario', '=', Auth::user()->username)
             ->orderBy('id', 'desc')
             ->paginate(5);
             return view('certificados.index', ['certificados' => $certificados, 'search' => $query]);
        }
        
        if (Auth::user()->nivel == 'supervisor'){
            $certificados = Certificados::where('localidad', 'LIKE', Auth::user()->localidad)
            ->where('dependencia','LIKE',Auth::user()->dependencia)
             ->orderBy('id', 'desc')
             ->paginate(5);
             return view('certificados.index', ['certificados' => $certificados, 'search' => $query]);
        }

        if (Auth::user()->nivel == 'admin'){
            $certificados = Certificados::where('localidad', 'LIKE', Auth::user()->localidad)
             ->orWhere('nro_certificado','LIKE',"%$query%")
             ->orWhere('nombre_comerciante','LIKE',"%$query%")
             ->orWhere('nombre_comercio','LIKE',"%$query%")
             ->orWhere('observaciones','LIKE',"%$query%")
             ->orWhere('localidad','LIKE',"%$query%")
             ->orWhere('dependencia','LIKE',"%$query%")
             ->orWhere('usuario','LIKE',"%$query%")
             ->orderBy('id', 'desc')
             ->paginate(5);
             return view('certificados.index', ['certificados' => $certificados, 'search' => $query]);
        }
        
        // if ($request){
        //     $certificados = Certificados::where('usuario', '=', Auth::user()->username)
        //     ->orWhere('nro_certificado','LIKE',"%$query%")
        //     ->orWhere('nombre_comerciante','LIKE',"%$query%")
        //     ->orWhere('nombre_comercio','LIKE',"%$query%")
        //     ->orWhere('observaciones','LIKE',"%$query%")
        //     ->where('usuario', '=', Auth::user()->username)
        //     ->orderBy('id', 'desc')
        //     ->paginate(5);
        //     return view('certificados.index', ['certificados' => $certificados, 'search' => $query]);
        // }
        // $certificados = Certificados::all();
        // return view('certificados.index', ['certificados' => $certificados]);
    }

    
    public function create()
    {
        return view('certificados.create');
    }

    
    public function store(Request $request)
    {
            // print_r($request -> all());
            $certificado = new Certificados();
            $certificado->orden = $request->input('orden');
            $certificado->nro_certificado = $request->input('nro_certificado');
            $certificado->fecha = $request->input('fecha');
            $certificado->desde = $request->input('desde');
            $certificado->hasta = $request->input('hasta');
            $certificado->localidad = $request->input('localidad');
            $certificado->dependencia = $request->input('dependencia');
            $certificado->nombre_comerciante = $request->input('nombre_comerciante');
            $certificado->nombre_comercio = $request->input('nombre_comercio');
            $certificado->rubro = $request->input('rubro');
            $certificado->direccion = $request->input('direccion');
            $certificado->observaciones = $request->input('observaciones');
            $certificado->previa = $request->input('previa');
            $certificado->usuario = $request->input('usuario');

            $certificado->save();
            $idRecienGuardada = $certificado->id;
            # Y podemos obtener cualquier propiedad, pues está refrescado
            # Aquí ya puedes hacer lo que quieras con el id
            // echo json_encode($certificado);
            return redirect('/certificados/'.$idRecienGuardada);
    }

    
    public function show($id)
    {
        return view('certificados.show', ['certificados'=>Certificados::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('certificados.edit', ['certificados'=>Certificados::findOrFail($id)]);
    }

  
    public function update(Request $request, $id)
    {
        // print_r($request -> all());
        $certificado = Certificados::findOrFail($id);
        $certificado->orden = $request->get('orden');
        $certificado->fecha = $request->get('fecha');
        $certificado->desde = $request->get('desde');
        $certificado->hasta = $request->get('hasta');
        $certificado->localidad = $request->get('localidad');
        $certificado->dependencia = $request->get('dependencia');
        $certificado->nombre_comerciante = $request->get('nombre_comerciante');
        $certificado->nombre_comercio = $request->get('nombre_comercio');
        $certificado->rubro = $request->get('rubro');
        $certificado->direccion = $request->get('direccion');
        $certificado->observaciones = $request->get('observaciones');
        $certificado->previa = $request->get('previa');
        $certificado->usuario = $request->get('usuario');

        $certificado->update();
        // echo json_encode($certificado);
        return redirect('/certificados');
    }

    
    public function destroy($id)
    {
        $certificado = Certificados::findOrFail($id);
        $certificado->delete();

        return redirect('/certificados');
    }
}
