@extends('layouts.app')
@section('module', 'Órdenes')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado de Órdenes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre Usuario</th>
                            <th>Teléfono Usuario</th>
                            <th>Dirección de Entrega</th>
                            <th>Descripción Orden</th>
                            <th>Total</th>
                            <th>Nombre Producto</th>
                            <th>Precio Producto</th>
                            <th>Descripción Producto</th>
                            <th>Foto Producto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->user->phone }}</td>
                                <td>{{ $order->delivery_address }}</td>
                                <td>{{ $order->description }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->product->name }}</td>
                                <td>{{ $order->product->price }}</td>
                                <td>{{ $order->product->description }}</td>
                                <td>
                                    @if($order->product && $order->product->photo)
                                        <img src="{{ asset('storage/' . $order->product->photo) }}" alt="Foto" style="max-width: 80px; max-height: 80px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#modalEdit" id="{{ $order->id }}">Editar</button>
                                    <button class="btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#modalDelete" id="{{ $order->id }}">Eliminar</button>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Órdenes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="user" action="{{ route('orders.store') }} ">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="user_id">Usuario</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    <option value="">Seleccione un usuario</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="product_id">Producto</label>
                                <select class="form-control" id="product_id" name="product_id" required>
                                    <option value="">Seleccione un producto</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }} - ${{ $product->price }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="delivery_address" name="delivery_address"
                                    value="{{ old('delivery_address') }}" placeholder="Dirección de Entrega" required autofocus autocomplete="delivery_address">
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control form-control-user" id="total" name="total"
                                    value="{{ old('total') }}" placeholder="Total" required autocomplete="total">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control form-control-user" id="description"
                                    name="description" value="{{ old('description') }}" placeholder="Descripción" required autocomplete="description">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Órdenes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="PUT" id="formEdit" class="user" action="{{ route('orders.update', $order->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="text" id="orderId" name="id" hidden>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="delivery_addressEdit" name="delivery_address"
                                    value="{{ old('delivery_address') }}" placeholder="Dirección de Entrega" required autofocus autocomplete="delivery_address">
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control form-control-user" id="totalEdit"
                                    name="total" value="{{ old('total') }}" placeholder="Total" required autocomplete="total">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control form-control-user" id="descriptionEdit"
                                    name="description" value="{{ old('description') }}" placeholder="Descripción" required autocomplete="description">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Órdenes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="DELETE" id="formDelete" class="user" action="{{ route('orders.destroy', $order->id) }}">
                        @csrf
                        @method('DELETE')
                        <p>¿Realmente quiere eliminar esta orden?</p>
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
            var orderId = $(this).attr('id');
            $.get('orders/' + orderId + '/edit', {}, function(data) {
                var order = data.order;
                $('input[id="orderId"]').val(orderId);
                $('input[id="delivery_addressEdit"]').val(order.delivery_address);
                $('input[id="totalEdit"]').val(order.total);
                $('input[id="descriptionEdit"]').val(order.description);
            })
        })

        $('#formEdit').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var orderId = form.find('input[name="id"]').val();
            var url = "/orders/" + orderId;
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
            var orderId = $(this).attr('id');
            $('button[id="delete"]').val(orderId);
        })

        $('#formDelete').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var orderId = form.find('button[id="delete"]').val();
            var url = "/orders/" + orderId;
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
