@forelse ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->lastname }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->email }}</td>
        <td><button class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#modalEdit"
                id="{{ $user->id }}">Editar</button>
            <button class="btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#modalDelete"
                id="{{ $user->id }}">Eliminar</button>
        </td>
    </tr>
@empty
    <h1>No encontro registros para criterios de busqueda</h1>
@endforelse