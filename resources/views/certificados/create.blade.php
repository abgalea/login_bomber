@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form action="/certificados" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nro Orden</label>
                    <input type="text" class="form-control" name="orden" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nro Certificado</label>
                  <input type="text" class="form-control" name="nro_certificado" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Fecha de Emisión</label>
                  <input type="date" class="form-control" name="fecha" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Válido desde</label>
                  <input type="date" class="form-control" name="desde" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Válido Hasta</label>
                    <input type="date" class="form-control" name="hasta" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre Titular</label>
                  <input type="text" class="form-control" name="nombre_comerciante" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre del Comercio</label>
                  <input type="text" class="form-control" name="nombre_comercio" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Rubro</label>
                    <input type="text" class="form-control" name="rubro" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Dirección</label>
                  <input type="text" class="form-control" name="direccion" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Detalle - Observaciones</label>
                  <input type="text" class="form-control" name="observaciones" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Previa</label>
                  <input type="text" class="form-control" name="previa" value="0" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Usuario</label>
                  <input type="text" value="{{ auth()->user()->name }}" class="form-control" disabled>
                  <input type="hidden" class="form-control" value="{{ auth()->user()->name }}" name="usuario">
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
              </form>
        </div>
    </div>
</div>
    
@endsection