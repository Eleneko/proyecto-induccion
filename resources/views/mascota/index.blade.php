@extends('layouts.app')

@section('template_title')
    Mascota
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <strong><i class="fa-solid fa-cat"></i> {{ __('REGISTRO DE MASCOTAS') }} </strong>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('mascotas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Añadir') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p><i class="fa-solid fa-check"></i> {{ $message }}</p>
                        </div>
                    @endif
                    
                    @if ($message = Session::get('danger'))
                        <div class="alert alert-danger">
                            <p><i class="fa-solid fa-trash"></i> {{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                                <div class="card-body" id="fondo">
                                    <div class="table-responsive" >   
                                                @foreach ($mascotas as $mascota)
                                                <div id="divisor-cartas">
                                                    <div class="card" id="tarjeta">
                                                        <img class="card-img-top" src="{{ asset('storage').'/'.$mascota->foto }}" alt="Card image cap">
                                                        <div class="card-body">
                                                            <h3 class="card-title"><strong>{{ $mascota->nombre }}</strong></h3>

                                                            <p class="card-text"><strong>Edad: </strong>{{ $mascota->edad }}</p>
                                                            <p class="card-text"><strong>Dueño: </strong>{{ $mascota->dueno }}</p>
                                                            
                                                            <form action="{{ route('mascotas.destroy',$mascota->id) }}" method="POST">
                                                                <a class="btn btn-sm btn-primary " href="{{ route('mascotas.show',$mascota->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                                <a class="btn btn-sm btn-success" href="{{ route('mascotas.edit',$mascota->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                            </form>
                                                        </div>
                                                    </div>  
                                                </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! $mascotas->links() !!}
            </div>
        </div>
    </div>
@endsection
