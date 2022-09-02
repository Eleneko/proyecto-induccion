@extends('layouts.app')

@section('template_title')
    {{ $mascota->name ?? 'Show Mascota' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('mascotas.index') }}"> Regresar al registro</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $mascota->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Dueño:</strong>
                            {{ $mascota->dueno }}
                        </div>
                        <div class="form-group">
  
                            <img src="{{ asset('storage').'/'.$mascota->foto }}" width="600px">
                        </div>
                        <div class="form-group">
                            <strong>Especie:</strong>
                            {{ $mascota->especie }}
                        </div>
                        <div class="form-group">
                            <strong>Edad:</strong>
                            {{ $mascota->edad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
