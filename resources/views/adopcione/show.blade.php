@extends('layouts.app')

@section('template_title')
    {{ $adopcione->name ?? 'Show Adopcione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles mascota en adopción</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('adopciones.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $adopcione->nombre }}
                        </div>
                        <div class="form-group">
                            <img src="{{ asset('storage').'/'.$adopcione->foto }}" width="600px">
                        </div>
                        <div class="form-group">
                            <strong>Especie:</strong>
                            {{ $adopcione->especie }}
                        </div>
                        <div class="form-group">
                            <strong>Edad Estimada:</strong>
                            {{ $adopcione->edad_estimada }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
