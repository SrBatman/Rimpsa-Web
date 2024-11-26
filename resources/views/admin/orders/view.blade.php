@extends('layouts.admin')

@section('title', 'Rimpsa – Detalles de pedidos')

@section('content')

<div class="contents"style="background: #313338;  color: #fff;">
    <div class="container-fluid"style="background: #313338;  color: #fff;">
        <div class="row "style="background: #313338;  color: #fff;">
            <div class="col-lg-12"style="background: #313338;  color: #fff;" >

                <div class="breadcrumb-main"style="background: #313338;  color: #fff;">
                    <h4 class="text-capitalize breadcrumb-title"style="background: #313338;  color: #fff;">Detalles de mi pedido</h4>

                    <div class="breadcrumb-action justify-content-center flex-wrap"style="background: #313338;  color: #fff;">

                        <div class="action-btn">
                            {{-- <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm float-end mx-1">Back</a> --}}
                            <a href="{{ url('admin/orders') }}" class="btn btn-sm btn-danger btn-add">
                                <i class="la la-arrow-left"></i>Volver</a>
                        </div>

                        <div class="action-btn">
                            {{-- <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-primary btn-sm float-end mx-1">Descargar Factura</a> --}}
                            <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-sm btn-primary btn-add">
                                <i class="la la-download"></i>Descargar Factura</a>
                        </div>

                        <div class="action-btn">
                            {{-- <a href="{{ url('admin/invoice/'.$order->id) }}" target="__blank" class="btn btn-warning btn-sm float-end mx-1">Ver Factura</a> --}}
                            <a href="{{ url('admin/invoice/'.$order->id) }}" class="btn btn-sm btn-warning btn-add">
                                <i class="la la-eye"></i>Ver Factura</a>
                        </div>

                        <div class="action-btn">
                            <a href="{{ route('admin.orders.mailInvoice', ['orderId' => $order->id]) }}" class="btn btn-sm btn-info btn-add">
                                <i class="la la-send"></i>Enviar factura por correo electrónico
                            </a>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- CODE HERE -->
            <div class="col-lg-12 mb-30">
                @if (session('message'))
                    <div class="alert alert-success mb-3">{{ session('message') }}</div>
                @endif

                <div class="card"style="background: #313338;  color: #fff;">
                    <div class="card-header color-dark fw-500"style="background: #313338;  color: #fff;">
                        Detalles de mi pedido
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <h5 style="color: #fff;">Detalles de mi pedido</h5>
                                <h6 style="color: #fff;">Id de pedido: {{ $order->id }}</h6>
                                <h6 style="color: #fff;">Id de seguimiento.: {{ $order->tracking_no }}</h6>
                                <h6 style="color: #fff;">Fecha de la orden: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                                <h6 style="color: #fff;">Metodo de pago: {{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success mt-3" style="color: #fff;">
                                    Mensaje del estatus: <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5 style="color: #fff;">Detalles del ususario</h5>
                                <h6 style="color: #fff;">Nombre Completo {{ $order->fullname }}</h6>
                                <h6 style="color: #fff;">Email Id: {{ $order->email }}</h6>
                                <h6 style="color: #fff;">Telefono: {{ $order->phone }}</h6>
                                <h6 style="color: #fff;">Direccion: {{ $order->address }}</h6>
                                <h6 style="color: #fff;">Codigo postal: {{ $order->pincode }}</h6>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-lg-12 mb-30"style="background: #313338;  color: #fff;">
                <div class="card"style="background: #313338;  color: #fff;">
                    <div class="card-header color-dark fw-500"style="background: #313338;  color: #fff;">
                        Ordenar productos
                    </div>
                    <div class="card-body"style="background: #313338;  color: #fff;">
                        <div class="userDatatable global-shadow border-0 bg-white w-100">
                            <div class="table-responsive">
                                <table class="table mb-0 table-borderless" style="background: #313338;  color: #fff;">
                                    <thead>
                                        <tr class="userDatatable-header"style="background: #313338;  color: #fff;">
                                            <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color: #fff;">ID de producto</span></th>
                                            <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color: #fff;">Imagen</span></th>
                                            <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color: #fff;">Producto</span></th>
                                            <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color: #fff;">Precio</span></th>
                                            <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color: #fff;">Cantidad</span></th>
                                            <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color: #fff;">Total</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                        @foreach ($order->orderItems as $orderItem)
                                            <tr>
                                                <td><div class="userDatatable-content" style="background: #313338;  color: #fff;">{{ $orderItem->id }}</div></td>
                                                <td>
                                                    @if ($orderItem->product->productImages)
                                                        <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                            style="width: 50px; height: 50px" alt="">
                                                    @else
                                                        <img src="" style="width: 50px; height: 50px" alt="">
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $orderItem->product->name }}
                                                        @if ($orderItem->productColor)
                                                            @if ($orderItem->productColor->color)
                                                                <span>- Color: {{ $orderItem->productColor->color->name }}</span>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </td>
                                                <td><div class="userDatatable-content">{{ $orderItem->price }}</div></td>
                                                <td><div class="userDatatable-content">{{ $orderItem->quantity }}</div></td>
                                                <td><div class="userDatatable-content">${{ number_format($orderItem->quantity * $orderItem->price , 2) }}</div></td>
                                                @php
                                                    $totalPrice += $orderItem->quantity * $orderItem->price;
                                                @endphp
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5" class="userDatatable-content"style="color: #fff;">Cantidad Total:</td>
                                            <td colspan="1" class="userDatatable-content"style="color: #fff;">${{ number_format($totalPrice, 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-12 mb-30"style="background: #313338;  color: #fff;">
                <div class="card"style="background: #313338;  color: #fff;">
                    <div class="card-header color-dark fw-500"style="background: #313338;  color: #fff;">
                        Proceso de pedido (actualizaciones del estado del pedido)
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <label>Coloque el estado de su pedido</label>
                                    <div class="input-group">
                                        <select name="order_status" class="form-select">
                                            <option value="">Seleccione el estado del pedido</option>
                                            <option value="In Progress" {{ Request::get('status') == 'In Progress' ? 'selected':''}}>En proceso</option>
                                            <option value="Completed" {{ Request::get('status') == 'Completed' ? 'selected':''}}>Completado</option>
                                            <option value="Pending" {{ Request::get('status') == 'Pending' ? 'selected':''}}>Pendiente</option>
                                            <option value="Cancelled" {{ Request::get('status') == 'Cancelled' ? 'selected':''}}>Cancelado</option>
                                            <option value="Out for Delivery" {{ Request::get('status') == 'Out for Delivery' ? 'selected':''}}>Listo para entrega</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary text-white">Actualizar</button>
                                    </div>

                                </form>
                            </div>
                            <div class="col-md-7">
                                <br />
                                <h4 class="md-3">Estado actual del pedido: <span class="text-uppercase">{{ $order->status_message }}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection