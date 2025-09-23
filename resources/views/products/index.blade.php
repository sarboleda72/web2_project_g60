@extends('layouts.app')
@section('module', 'Productos')

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
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Descripción</th>
                            <th>Disponible</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Descripción</th>
                            <th>Disponible</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td><img src="{{ asset('img') }}/{{ $product->photo }}" alt="" width="50px"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->available }}</td>
                                <td>
                                    <button class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#modalEdit" id="{{ $product->id }}">Editar</button>
                                    <button class="btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#modalDelete" id="{{ $product->id }}">Eliminar</button>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Productos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="user" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <input type="file" class="form-control form-control-user" id="photo" name="photo">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="name" name="name" value="{{ old('name') }}" placeholder="Nombre" required autofocus autocomplete="name">
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control form-control-user" id="price" name="price" value="{{ old('price') }}" placeholder="Precio" required autocomplete="price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="description" name="description" value="{{ old('description') }}" placeholder="Descripción" required autocomplete="description">
                            </div>
                            <div class="col-sm-6">
                                <label for="availableEdit">Disponible</label>
                                <input type="hidden" name="available" value="0">
                                <input type="checkbox" class="form-check-input" id="available" name="available" value="1" {{ old('available') ? 'checked' : '' }}> Disponible
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Productos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="PUT" id="formEdit" class="user" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="text" id="productId" name="id" hidden>
                        <div class="d-flex align-items-center justify-content-center">
                            <img id="photoShow" src="" alt="" width="100px">
                        </div>
                        <div class="form-group row">
                            <input type="file" class="form-control form-control-user" id="photoEdit" name="photo">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="nameEdit" name="name" value="" placeholder="Nombre" required autofocus autocomplete="name">
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control form-control-user" id="priceEdit" name="price" value="" placeholder="Precio" required autocomplete="price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="descriptionEdit" name="description" value="" placeholder="Descripción" required autocomplete="description">
                            </div>
                            <div class="col-sm-6">
                                <label for="availableEdit">Disponible</label>
                                <input type="hidden" name="available" value="0">
                                <input type="checkbox" class="form-check-input" id="availableEdit" name="available" value="1"> Disponible
                            </div>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Productos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="DELETE" id="formDelete" class="user"
                        action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')

                        <p>¿Realmente quiere eliminar este producto?</p>
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
            var productId = $(this).attr('id');
            $.get('products/' + productId + '/edit', {}, function(data) {
                var product = data.product;
                $('input[id="productId"]').val(productId);
                $('input[id="nameEdit"]').val(product.name);
                $('input[id="priceEdit"]').val(product.price);
                $('input[id="descriptionEdit"]').val(product.description);
                if (product.available == 1) {
                    $('input[id="availableEdit"]').prop('checked', true);
                } else {
                    $('input[id="availableEdit"]').prop('checked', false);
                }
                if(product.photo){
                    $('img[id="photoShow"]').attr('src', "{{ asset('img') }}/" + product.photo);
                } else {
                    $('img[id="photoShow"]').attr('src', "");
                }
            })
        })

        $('#formEdit').submit(function(e) {
            e.preventDefault();
            var form = $(this)[0];
            var productId = $('input[name="id"]').val();
            var url = "/products/" + productId;
            var formData = new FormData(form);
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers:{
                    'X-HTTP-Method-Override': 'PUT'
                }
            }).always(function(respose) {
                console.log("Actualización exitosa", respose);
                location.reload();
            })
        })

        $(document).on('click', '.delete', function() {
            var productId = $(this).attr('id');
            $('button[id="delete"]').val(productId);
        })

        $('#formDelete').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var productId = form.find('button[id="delete"]').val();
            var url = "/products/" + productId;
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
