@extends('layouts.app')

@section('content')

{{-- <div class="container"> --}}
    <h2>Lista de Certificados - CIU (Cada certificado tiene un <b>Código de Identificación Único</b>) <a href="certificados/create"><button type="button" class="btn btn-success float-right">Agregar Certificados</button></a></h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
            <th scope="col">CIU</th>
            <th scope="col">Info Certificado</th>
            <th scope="col">Fecha Válida</th>
            <th scope="col">Titular</th>
            <th scope="col">Rubro</th>
            <th scope="col">Comercio</th>
            <th scope="col">Observacion</th>
            <th scope="col">Lugar Emisión</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($certificados as $certificado)

            <tr>
            <th scope="row">{{$certificado->id}}</th>
            <td>
              Nro: <b>{{$certificado->nro_certificado}}</b><br>
              Emitido: <b>{{date('d/m/y', strtotime($certificado->fecha))}}</b>
            </td>
            <td>DESDE: <b>{{date('d/m/y', strtotime($certificado->desde))}}</b> <br> 
               HASTA: <b>{{date('d/m/y', strtotime($certificado->hasta))}} </b></td>
            <td>{{$certificado->nombre_comerciante}}</td>
            <td>{{$certificado->rubro}}</td>
            <td>{{$certificado->nombre_comercio}}</td>
            <td>
              {{$certificado->observaciones}}<br>
              PREVIA: <b>{{$certificado->previa}}</b>
            </td>
            <td>
              Localidad: <b>{{$certificado->localidad}}</b><br>
              Dpencia: <b>{{$certificado->dependencia}}</b>
            </td>
            <td>
                
                <form action="{{ route('certificados.destroy', $certificado->id) }}" method="POST">
                  <a href="{{ route('certificados.show', $certificado->id) }}"><button type="button" class="btn btn-secondary">CIU</button></a>
                  {{-- <a href="{{ route('certificados.edit', $certificado->id) }}"><button type="button" class="btn btn-info">Editar</button></a> --}}
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
                </td>
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