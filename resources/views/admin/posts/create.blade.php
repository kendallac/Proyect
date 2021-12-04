@extends('adminlte::page')
@section('title', 'Logic code')

@section('content_header')
    <h1>Crear Nuevo Post</h1>
@stop

@section('content')
<div class="card">
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}
            {!! Form::hidden('user_id', auth()->user()->id) !!}
            @include('admin.posts.partials.form')
            {!! Form::submit('crear Post', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}
        </div>


    </div>
@stop


