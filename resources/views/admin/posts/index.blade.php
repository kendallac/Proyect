@extends('adminlte::page')
@section('title', 'Logic code')

@section('content_header')

<a class="btn btn-secondary float-right" href="{{ route('admin.posts.create') }}">Nuevo post</a>

    <h1>Mostrar Listado De post </h1>
@stop

@section('content')
<div class="card">
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
@livewire('admin.posts-index')
@stop
