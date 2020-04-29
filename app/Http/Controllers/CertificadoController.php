<?php

namespace App\Http\Controllers;

use App\Certificados;
use Illuminate\Http\Request;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = trim($request->get('search'));
        // $usuarioLogueado = user()->id;
        if ($request){
            $certificados = Certificados::where('orden', 'LIKE', '%'.$query.'%')
            ->orWhere('nro_certificado','LIKE',"%$query%")
            ->orWhere('nombre_comerciante','LIKE',"%$query%")
            ->orWhere('nombre_comercio','LIKE',"%$query%")
            ->orWhere('observaciones','LIKE',"%$query%")
            // ->where('usuarios','LIKE',"%$usuarioLogueado%")
            ->orderBy('id', 'desc')
            ->paginate(5);
            return view('certificados.index', ['certificados' => $certificados, 'search' => $query]);
        }
        // $certificados = Certificados::all();
        // return view('certificados.index', ['certificados' => $certificados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // print_r($request -> all());
            $certificado = new Certificados();
            $certificado->orden = $request->input('orden');
            $certificado->nro_certificado = $request->input('nro_certificado');
            $certificado->fecha = $request->input('fecha');
            $certificado->desde = $request->input('desde');
            $certificado->hasta = $request->input('hasta');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('certificados.show', ['certificados'=>Certificados::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('certificados.edit', ['certificados'=>Certificados::findOrFail($id)]);
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
        // print_r($request -> all());
        $certificado = Certificados::findOrFail($id);
        $certificado->orden = $request->get('orden');
        $certificado->fecha = $request->get('fecha');
        $certificado->desde = $request->get('desde');
        $certificado->hasta = $request->get('hasta');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certificado = Certificados::findOrFail($id);
        $certificado->delete();

        return redirect('/certificados');
    }
}
