@extends('adminlte::page')
@section('title', 'Logic code')

@section('content_header')
    <h1>Asignar un Rol</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{ sessioeditn('info') }}</strong>
</div>
@endif
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop