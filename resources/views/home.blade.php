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

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $total_apostoles }}</h3>
  
                  <p>Certificados en Apóstoles</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('certificados?localidad=Apostoles')}}" class="small-box-footer">Más Info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $total_obera}}</h3>
  
                  <p>Certificados en Oberá</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ url('certificados?localidad=Obera')}}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>{{ $total_posadas}}</h3>
  
                  <p>Certificados en Posadas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ url('certificados?localidad=Posadas')}}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                <h3>{{ $total_apostoles }}</h3>
  
                  <p>Certificados en Garupá</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ url('certificados?localidad=Garupa')}}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-12 col-12">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{ $total_vencer}}</h3>
    
                    <p>Certificados por Vencer</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="{{ url('certificados?porVencer=1')}}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
          </div>
        <div class="card">
            <h5 class="card-header bg-blue"> Dirección Bomberos de la Policía de Misiones</h5>
            <div class="card-body">
                <h3>Datos de Usuario</h3>
                <img src="{{  $obj[0]["foto"] }}" class="img-fluid rounded float-right" alt="User Image">
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
