@extends('adminlte::page')
@section('title', 'Logic code')

@section('content_header')
    <h1>Crear Nueva Categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.users.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre del usuario ']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }} </span>
                @enderror

            </div>
            <div class="form-group">
                {!! Form::label('email', 'correo') !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'ingrese el email del usuario']) !!}
                
            </div>
            <div class="form-group">
                {!! Form::label('password', 'password') !!}
                {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'ingrese el password del usuario']) !!}
                
            </div>

            {!! Form::submit('crear usuario', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>


    </div>

@stop

@section('js')

    
@endsection
