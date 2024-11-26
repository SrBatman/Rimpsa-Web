@extends('layouts.admin')

@section('title', 'Rimpsa – Ordenes')

@section('content')

    <div class="contents" style="background: #313338; color: #fff;">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title" style=" color: #fff;">Órdenes de administrador</h4>

                        <form action="" method="GET">
                            <div class="breadcrumb-action justify-content-center flex-wrap">

                                <div class="action-btn" style="color:#000;">
                                    <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control" style="color:#000;"/>
                                </div>

                                <div class="action-btn">
                                    <div class="atbd-select ">
                                        <select name="status" class="form-control " style="color:#000;">
                                            <option value="">Seleccionar todos los estados</option>
                                            <option value="In Progress" {{ Request::get('status') == 'In Progress' ? 'selected':''}}>En proceso</option>
                                            <option value="Completed" {{ Request::get('status') == 'Completed' ? 'selected':''}}>Completado</option>
                                            <option value="Pending" {{ Request::get('status') == 'Pending' ? 'selected':''}}>Pendiente</option>
                                            <option value="Cancelled" {{ Request::get('status') == 'Cancelled' ? 'selected':''}}>Cancelado</option>
                                            <option value="Out for Delivery" {{ Request::get('status') == 'Out for Delivery' ? 'selected':''}}>Listo para entrega</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="action-btn">
                                    <button type="submit" class="btn btn-sm btn-primary btn-add"><i class="la la-send"></i>Filtrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- CODE HERE -->
                <div class="col-lg-12 mb-30" style="background: #313338;  color: #fff;">
                    <div class="card" style="background: #313338;  color: #fff;">
                        <div class="card-header color-dark fw-500" style="background: #313338;  color: #fff;">
                            Órdenes de administrador
                        </div>
                        <div class="card-body" style="background: #313338;  color: #fff;">

                            <div class="userDatatable global-shadow border-0 bg-white w-100">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless" style="background: #313338;  color: #fff;">
                                        <thead style="background: #313338;  color: #fff;">
                                            <tr class="userDatatable-header" style="background: #313338;  color: #fff;">
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title"  style="color:#fff;"> ID</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Número de seguimiento</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Nombre de usuario</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Modo de pago </span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Fecha de pedido </span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Mensaje de estado</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title float-left" style="color:#fff;">Acción</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $item)
                                                <tr>
                                                    <td style="color: #fff;"><div class="userDatatable-content" style="color: #fff;">{{ $item->id }}</div></td>
                                                    <td><div class="userDatatable-content" style="color: #fff;">{{ $item->tracking_no }}</div></td>
                                                    <td><div class="userDatatable-content" style="color: #fff;">{{ $item->fullname }}</div></td>
                                                    <td><div class="userDatatable-content" style="color: #fff;">{{ $item->payment_mode }}</div></td>
                                                    <td><div class="userDatatable-content" style="color: #fff;">{{ $item->created_at->format('d-m-Y') }}</div></td>
                                                    <td>
                                                        <div class="userDatatable-content d-inline-block" >
                                                            @if ($item->status_message == 'Pending')
                                                                <span style="color: #fff;"class="bg-opacity-warning  color-warning rounded-pill userDatatable-content-status active">{{ $item->status_message }}</span>
                                                            @elseif ($item->status_message == 'In Progress')
                                                                <span style="color: #fff;"class="bg-opacity-warning  color-warning rounded-pill userDatatable-content-status active">{{ $item->status_message }}</span>
                                                            @elseif ($item->status_message == 'Out for Delivery')
                                                                <span style="color: #fff;"class="bg-opacity-primary  color-primary rounded-pill userDatatable-content-status active">{{ $item->status_message }}</span>
                                                            @elseif ($item->status_message == 'Completed')
                                                                <span style="color: #fff;"class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">{{ $item->status_message }}</span>
                                                            @elseif ($item->status_message == 'Cancelled')
                                                                <span style="color: #fff;"class="bg-opacity-danger  color-danger rounded-pill userDatatable-content-status active">{{ $item->status_message }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <ul class="orderDatatable_actions mb-0 flex-wrap">
                                                            <li>
                                                                <a href="{{ url('admin/orders/' . $item->id) }}" class="view">
                                                                    <span data-feather="eye"></span></a>
                                                            </li>
                                                       
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7">No hay pedidos disponibles
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
