<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $adopcione->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('foto') }}
            {{ Form::file('foto', [asset('storage').'/'.$adopcione->foto], ['class' => 'form-control' . ($errors->has('foto') ? ' is-invalid' : ''), 'placeholder' => 'Foto']) }}
            {!! $errors->first('foto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('especie') }}
            {{ Form::text('especie', $adopcione->especie, ['class' => 'form-control' . ($errors->has('especie') ? ' is-invalid' : ''), 'placeholder' => 'Especie']) }}
            {!! $errors->first('especie', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('edad_estimada') }}
            {{ Form::text('edad_estimada', $adopcione->edad_estimada, ['class' => 'form-control' . ($errors->has('edad_estimada') ? ' is-invalid' : ''), 'placeholder' => 'Edad Estimada']) }}
            {!! $errors->first('edad_estimada', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>