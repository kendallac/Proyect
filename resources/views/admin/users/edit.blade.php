@extends('adminlte::page')
@section('title', 'Logic code')

@section('content_header')
    <h1>Asignar Rol</h1>
@stop

@section('content')
@if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">

            <p class="h5">nombre:</p>
            <p class="form-control">{{ $user->name }}</p>


            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
            @foreach ($roles as $rol)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $rol->id, null, ['class' => 'mr-2']) !!}
                        {{ $rol->name }}
                    </label>
                </div>
            @endforeach
            {!! Form::submit('asignar rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop


