@extends('adminlte::page')
@section('title', 'Logic code')

@section('content_header')
@can('admin.categories.create')
    <a class="btn btn-secondary float-right " href="{{ route('admin.categories.create') }}">agregar categoria</a>

@endcan

    <h1>Listar Categorias</h1>
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
                        <th>id</th>
                        <th>name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            @can('admin.categories.edit')
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.categories.edit', $category) }}">editar</a>
                            </td>
                                @endcan
                                @can('admin.categories.destroy')
                                   <td width="10px">
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
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
