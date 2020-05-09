@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="card">
    @php
      $id = Auth::user()->revista;
      $url = "http://www.policia.misiones.gov.ar:8081/api/revistas.php?revista=".$user->revista;
      $json = file_get_contents($url);
      $obj = json_decode($json, true);
      // echo $obj[0]["jerarquia"];
  @endphp
      <h5 class="card-header"> Dirección Bomberos de la Policía de Misiones</h5>
      <div class="card-body">
          <img src="{{  $obj[0]["foto"] }}" class="rounded float-right" alt="User Image">
          Jerarquía: <b>{{ $obj[0]["jerarquia"] }}</b><br>
          Nombre: <b>{{ $obj[0]["apellido"] }} {{ $obj[0]["nombres"] }}</b><br>
          Dependencia: <b>{{ $obj[0]["dependencia"] }}</b><br>
          Escalafón: <b>{{ $obj[0]["escalafon"] }}</b><br>
          Usuario: <b>{{ $user->username}}</b><br>
          Correo Electrónico: <b>{{ $user->email}}</b>

          
      </div>
    </div>
</div>


    
@endsection