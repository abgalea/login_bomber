@extends('layouts.app')

@section('content')
<div class="container">
    
    @php
                            $id = Auth::user()->revista;
                            $url = "http://190.139.107.170:8081/api/revistas.php?revista=".$id;
                            $json = file_get_contents($url);
                            $obj = json_decode($json, true);
                            // echo $obj[0]["jerarquia"];
                        @endphp
    {{-- <div class="card">
        <div class="card-header">
            <img class="rounded float-left" src="/img/logo_bom.jpg" alt="Card image cap"> DIRECCIÓN DE BOMBEROS
        </div>  
        
        <div class="card-body">
            
            <img src="{{  $obj[0]["foto"] }}" class="mx-auto d-block img-circle elevation-2" alt="User Image">
            <h3>Personal Policial: {{ $obj[0]["jerarquia"] }} {{ $obj[0]["apellido"] }} {{ $obj[0]["nombres"] }}</h3>
        </div>
        <div class="card-footer">
            Policía de la Provincia de Misiones - Ministerio de Gobierno
        </div>
    </div> --}}

    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header bg-danger"> Dirección Bomberos de la Policía de Misiones</h5>
            <div class="card-body">
                <h3>Datos de Usuario</h3>
                <img src="{{  $obj[0]["foto"] }}" class="rounded float-right" alt="User Image">
                Jerarquía: <b>{{ $obj[0]["jerarquia"] }}</b><br>
                Nombre: <b>{{ $obj[0]["apellido"] }} {{ $obj[0]["nombres"] }}</b><br>
                Dependencia: {{ $obj[0]["dependencia"] }}<br>
                Escalafón: {{ $obj[0]["escalafon"] }}<br>  
                
            </div>
          </div>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dirección Bomberos - Policía de la Provincia de Misiones - Ministerio de Gobierno</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            <img src='/img/logo_bom.jpg' class="ml-3" />
            <img src='/img/logo_polmis.jpg'class="ml-3" />
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
