@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="card">
        <div class="card-header">
            DIRECCIÓN DE BOMBEROS
        </div>  
        <img class="mx-auto d-block" src="/img/logo_bom.jpg" alt="Card image cap">
        <div class="card-body">
            
        </div>
        <div class="card-footer">
            Policía de la Provincia de Misiones - Ministerio de Gobierno
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
