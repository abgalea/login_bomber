@extends('layouts.app')

@section('content')

{{-- <div class="container"> --}}
    <h2>Lista de Certificados - CIU Viejos <a href="certificados/create"><button type="button" class="btn btn-success float-right">Agregar Certificados</button></a></h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
            <th scope="col">CIU</th>
            <th scope="col">Info Certificado</th>
            <th scope="col">Fecha Válida</th>
            <th scope="col">Titular</th>
            <th scope="col">Rubro</th>
            <th scope="col">Comercio</th>
            <th scope="col">Previa</th>
            <th scope="col">Lugar Emisión</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($certificados as $certificado)

            <tr>
            <th scope="row">CIU{{$certificado->id}}</th>
            <td>
              Nro: <b>{{$certificado->certificado}}</b><br>
              Emitido: <b>{{$certificado->fecha}}</b>
            </td>
            <td>DESDE: <b>{{$certificado->desde}}</b> <br> 
               HASTA: <b>{{$certificado->hasta}} </b></td>
            <td>{{$certificado->nombre}}</td>
            <td>{{$certificado->actividad}}</td>
            <td>{{$certificado->comercio}}</td>
            <td>
              {{$certificado->previa}}
            </td>
            <td>
              Por: <b>{{$certificado->lugar}}</b><br>
              Legajo: <b>{{$certificado->legajo}}</b>
            </td>
            <td><a href="{{ route('ciuviejo.show', $certificado->id) }}"><button type="button" class="btn btn-secondary">CIU</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto">
          {{ $certificados->links() }}
        </div>
      </div>
{{-- </div>     --}}
@endsection