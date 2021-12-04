@extends('adminlte::page')
@section('title', 'Logic code')

@section('content_header')
    <h1> editar estiqueta</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($tag,['route' => ['admin.tags.update',$tag],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre de la etiqueta ']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }} </span>
                @enderror

            </div>
            <div class="form-group">
                {!! Form::label('slug', 'slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder', 'readonly' => 'ingrese el nombre de la etiqueta, ']) !!}
                @error('slug')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Color</label>
                <select name="color" id="" class="form-control">
                    <option value="red">color rojo</option>
                    <option value="purple">color morado</option>
                    <option value="blue">color azul</option>
                    <option value="black">color negro</option>
                    <option value="green">color verde</option>

                </select>
            </div>

            {!! Form::submit('actualizar etiqueta', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>


    </div>

@stop

@section('js')

    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
