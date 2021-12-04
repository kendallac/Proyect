<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control " placeholder="ingrese el nombre de un Post" type="">
    </div>
    @if ($posts->count())
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
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->name }}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('admin.posts.edit', $post) }}">editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit"> eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    
    <div class="cardfooter">
        {{$posts->links()}}
    </div>
    @else
    <div class="card-body">
        <strong>No Hay Ningun Registro</strong>
    </div>
    @endif
      
</div>
