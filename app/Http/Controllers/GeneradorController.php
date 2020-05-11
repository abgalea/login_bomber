<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificados;

class GeneradorController extends Controller
{
    public function imprimir($id){
        // $pdf = \PDF::loadView('certificados.imprimir');
        // return $pdf->download('ejemplo.pdf');
        //$today = Carbon::now()->format('d/m/Y');
        //$certificados = Certificados::where('id', '=', $id);
        $pdf = \PDF::loadView('certificados.imprimir', ['certificados'=>Certificados::findOrFail($id)])
        ->setPaper('legal', 'portrait');
        return $pdf->download('CIU_Nro_'.$id.'.pdf');
   }
}
