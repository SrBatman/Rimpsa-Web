@extends('layouts.admin')

@section('title', 'Detalles de mi orden - DecoHogar Muebles')

@section('content')

<div class="contents">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Detalles de mi pedido</h4>

                    <div class="breadcrumb-action justify-content-center flex-wrap">

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

                <div class="card">
                    <div class="card-header color-dark fw-500">
                        Detalles de mi pedido
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Detalles de mi pedido</h5>
                                <h6>Id de pedido: {{ $order->id }}</h6>
                                <h6>Id de seguimiento.: {{ $order->tracking_no }}</h6>
                                <h6>Fecha de la orden: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                                <h6>Metodo de pago: {{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success mt-3">
                                    Mensaje del estatus: <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>Detalles del ususario</h5>
                                <h6>Nombre Completo {{ $order->fullname }}</h6>
                                <h6>Email Id: {{ $order->email }}</h6>
                                <h6>Telefono: {{ $order->phone }}</h6>
                                <h6>Direccion: {{ $order->address }}</h6>
                                <h6>Codigo postal: {{ $order->pincode }}</h6>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-lg-12 mb-30">
                <div class="card">
                    <div class="card-header color-dark fw-500">
                        Ordenar productos
                    </div>
                    <div class="card-body">
                        <div class="userDatatable global-shadow border-0 bg-white w-100">
                            <div class="table-responsive">
                                <table class="table mb-0 table-borderless">
                                    <thead>
                                        <tr class="userDatatable-header">
                                            <th><span class="userDatatable-title">ID de producto</span></th>
                                            <th><span class="userDatatable-title">Imagen</span></th>
                                            <th><span class="userDatatable-title">Producto</span></th>
                                            <th><span class="userDatatable-title">Precio</span></th>
                                            <th><span class="userDatatable-title">Cantidad</span></th>
                                            <th><span class="userDatatable-title">Total</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                        @foreach ($order->orderItems as $orderItem)
                                            <tr>
                                                <td><div class="userDatatable-content">{{ $orderItem->id }}</div></td>
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
                                                <td><div class="userDatatable-content">${{ number_format($orderItem->quantity * $orderItem->price), 2 }}</div></td>
                                                @php
                                                    $totalPrice += $orderItem->quantity * $orderItem->price;
                                                @endphp
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5" class="userDatatable-content">Cantidad Total:</td>
                                            <td colspan="1" class="userDatatable-content">${{ number_format($totalPrice), 2 }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-12 mb-30">
                <div class="card">
                    <div class="card-header color-dark fw-500">
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