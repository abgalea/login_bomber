@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row"> 
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header bg-gradient-lightblue">
          <h3 class="card-title">Lista de Certificados - CIU (<b>Código de Identificación Único</b>)</h3>
        </div>
        <div class="card-body">
    <h2> <!--<a href="certificados/create"><button type="button" class="btn btn-success float-right">Agregar Certificados</button></a>--></h2>
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
            {{-- <th scope="col">Borrar</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($certificados as $certificado)

            <tr>
            <th scope="row">CIU-{{$certificado->id}}</th>
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
            {{--  <td></td> --}}
            <td>
                
                <form action="{{ route('certificados.destroy', $certificado->id) }}" method="POST" class="form-inline">
                  <a href="/imprimir/{{$certificado->id}}"><button type="button" class="btn btn-danger"><i class="fas fa-file-pdf"></i></button></a>
                  <a href="{{ route('certificados.show', $certificado->id) }}"><button type="button" class="btn btn-success"><i class="fas fa-print"></i></button></a>
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-warning"><i class="far fa-trash-alt"></i></button>
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
</div>
</div>
</div>
</div>
</div>    
@endsection