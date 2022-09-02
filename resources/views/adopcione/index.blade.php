@extends('layouts.app')

@section('template_title')
    Adopcione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <strong><i class="fa-solid fa-paw"></i>  {{ __('MASCOTAS EN ADOPCIÓN') }}</strong>
                                
                            </span>

                             <div class="float-right">
                                <a href="{{ route('adopciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                    <div class="card-body" id="fondo">
                        <div class="table-responsive" >   
                                    @foreach ($adopciones as $adopcione)
                                    <div id="divisor-cartas">
                                        <div class="card" id="tarjeta">
                                            <img class="card-img-top" src="{{ asset('storage').'/'.$adopcione->foto }}" alt="Card image cap">
                                            <div class="card-body">
                                                <h3 class="card-title"><strong>{{ $adopcione->nombre }}</strong></h3>

                                                <p class="card-text"><strong>Edad estimada: </strong>{{ $adopcione->edad_estimada }}</p>
                                                
                                                <form action="{{ route('adopciones.destroy',$adopcione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('adopciones.show',$adopcione->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('adopciones.edit',$adopcione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $adopciones->links() !!}
            </div>
        </div>
    </div>
@endsection
