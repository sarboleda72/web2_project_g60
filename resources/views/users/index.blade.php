@extends('layouts.app')
@section('module', 'Usuarios')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->phone }}</td>
                                <td><button class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#modalEdit"
                                        id="{{ $user->id }}">Editar</button>
                                    <button class="btn btn-danger delete" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete" id="{{ $user->id }}">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="user" action="{{ route('users.store') }} ">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                    value="{{ old('name') }}" placeholder="Nombres" required autofocus
                                    autocomplete="name">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="lastname" name="lastname"
                                    value="{{ old('lastname') }}" placeholder="Apellidos" required autocomplete="lastname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="number" class="form-control form-control-user" id="phone" name="phone"
                                    value="{{ old('phone') }}" placeholder="Teléfono" required autocomplete="phone">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="address" name="address"
                                    value="{{ old('address') }}" placeholder="Dirección" required autocomplete="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="email" name="email"
                                value="{{ old('email') }}" placeholder="Correo electrónico" required
                                autocomplete="username">
                            @if ($errors->has('email'))
                                <span class="text-danger small">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="password" name="password"
                                    placeholder="Contraseña" required autocomplete="new-password">
                                @if ($errors->has('password'))
                                    <span class="text-danger small">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="password_confirmation"
                                    name="password_confirmation" placeholder="Confirmar contraseña" required
                                    autocomplete="new-password">
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger small">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Crear</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="PUT" id="formEdit" class="user" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="text" id="userId" name="id" hidden>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="nameEdit"
                                    name="name" value="{{ old('name') }}" placeholder="Nombres" required autofocus
                                    autocomplete="name">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="lastnameEdit"
                                    name="lastname" value="{{ old('lastname') }}" placeholder="Apellidos" required
                                    autocomplete="lastname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="phoneEdit"
                                    name="phone" value="{{ old('phone') }}" placeholder="Teléfono" required
                                    autocomplete="phone">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="addressEdit"
                                    name="address" value="{{ old('address') }}" placeholder="Dirección" required
                                    autocomplete="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="emailEdit" name="email"
                                value="{{ old('email') }}" placeholder="Correo electrónico" required
                                autocomplete="username">
                            @if ($errors->has('email'))
                                <span class="text-danger small">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Editar</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="DELETE" id="formDelete" class="user"
                        action="{{ route('users.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')

                        <p>¿Realmente quiere eliminar este usuario?</p>
                        <p>Esta acción es irrevercible.</p>
                        <button type="submit" id="delete" class="btn btn-danger btn-user btn-block">Eliminar</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).on('click', '.edit', function() {
            var userId = $(this).attr('id');

            $.get('users/' + userId + '/edit', {}, function(data) {
                var user = data.user;
                $('input[id="userId"]').val(userId);
                $('input[id="nameEdit"]').val(user.name);
                $('input[id="lastnameEdit"]').val(user.lastname);
                $('input[id="phoneEdit"]').val(user.phone);
                $('input[id="addressEdit"]').val(user.address);
                $('input[id="emailEdit"]').val(user.email);
            })
        })

        $('#formEdit').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var userId = form.find('input[name="id"]').val();
            var url = "/users/" + userId;

            $.ajax({
                url: url,
                type: 'PUT',
                data: form.serialize()
            }).always(function(respose) {
                console.log("Actualización exitosa", respose);
                location.reload();
            })
        })

        $(document).on('click', '.delete', function() {
            var userId = $(this).attr('id');
            $('button[id="delete"]').val(userId);
        })

        $('#formDelete').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var userId = form.find('button[id="delete"]').val();
            var url = "/users/" + userId;

            $.ajax({
                url: url,
                type: 'DELETE',
                data: form.serialize()
            }).always(function(respose) {
                console.log("Eliminación exitosa", respose);
                location.reload();
            })
        })
    </script>
@endsection
