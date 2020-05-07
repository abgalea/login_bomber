@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container">
      @php
      $id = Auth::user()->revista;
      $url = "http://www.policia.misiones.gov.ar:8081/api/revistas.php?revista=".$user->revista;
      $json = file_get_contents($url);
      $obj = json_decode($json, true);
      // echo $obj[0]["jerarquia"];
  @endphp
      <img src="{{  $obj[0]["foto"] }}" class="mx-auto d-block img-circle elevation-2" alt="User Image">
      <h1 class="display-4">Personal Policial<br> {{ $obj[0]["jerarquia"] }} {{ $obj[0]["apellido"] }} {{ $obj[0]["nombres"] }}</h1>
      <p class="lead">Correo Registrado: {{ $user->email}}
      <h3>usuario: {{ $user->username}}</h3></p>
    </div>
  </div>
    
@endsection