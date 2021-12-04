@extends('adminlte::page')
@section('title', 'Logic code')

@section('content_header')
@can('admin.tags.create')
<a class="btn btn-secondary float-right" href="{{ route('admin.tags.create') }}">agregar etiqueta</a>

@endcan

    <h1>Mostrar Listado De Etiquetas </h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>color</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->color }}</td>
                            @can('admin.tags.edit')
                                <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.tags.edit', $tag) }}">editar</a>
                            </td>
                            @endcan
                            
                            @can('admin.tags.destroy')
                                <td width="10px">
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit"> eliminar</button>
                                </form>
                            </td>
                            @endcan
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
