<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control " placeholder="ingrese el nombre de un usuario" type="">
    </div>
    @if ($users->count())
    <div class="card-body">

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th colspan="2"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('admin.users.edit', $user) }}">editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    
    <div class="cardfooter">
        {{$users->links()}}
    </div>
    @else
    <div class="card-body">
        <strong>No Hay Ningun Usuario</strong>
    </div>
    @endif
      
</div>
