@extends('adminlte::page')
@section('title', 'Logic code')

@section('content_header')
    <h1> editar Post</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">

        <div class="card-body">
            {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}
            {!! Form::hidden('user_id', auth()->user()->id) !!}
            @include('admin.posts.partials.form')
            {!! Form::submit('actualizar Post', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}
        </div>

{{--  --}}
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
