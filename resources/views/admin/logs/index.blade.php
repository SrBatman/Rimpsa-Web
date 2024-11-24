@extends('layouts.admin')

@section('title', 'Rimpsa - Registro de auditoria')

@section('content')

    <div class="contents" style="background: #313338; color: #fff;">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title" style=" color: #fff;">Registros de auditoria</h4>

                        <form action="" method="GET">
                            <div class="breadcrumb-action justify-content-center flex-wrap">

                                <div class="action-btn" style="color:#000;">
                                    <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control" style="color:#000;"/>
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
                            Registros de auditoria
                        </div>
                        <div class="card-body" style="background: #313338;  color: #fff;">

                            <div class="userDatatable global-shadow border-0 bg-white w-100">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless" style="background: #313338;  color: #fff;">
                                        <thead style="background: #313338;  color: #fff;">
                                            <tr class="userDatatable-header" style="background: #313338;  color: #fff;">
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title"  style="color:#fff;"> ID</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Acción</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Administrador</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Mensaje</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Fecha</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Detalles</span></th>
                                                
                                                <!-- <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Fecha de pedido </span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Mensaje de estado</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title float-left" style="color:#fff;">Accion</span></th> -->
                                            </tr>
                                        </thead>
                                        <tbody style="overflow-y: scroll;">
                                            @forelse ($logs as $log)
                                                <tr>
                                                    <td><div class="userDatatable-content" style="color:#fff;">{{ $log['_id'] }}</div></td>
                                                    <td><div class="userDatatable-content" style="color:#fff;">{{ $log['action'] }}</div></td>
                                                    <td><div class="userDatatable-content" style="color:#fff;">{{ $log['user'] }}</div></td>
                                                    <td><div class="userDatatable-content" style="color:#fff;  text-transform: none;">{{ $log['message'] }}</div></td>
                                                    <td><div class="userDatatable-content" style="color:#fff;">{{ $log['createdAt']->format('d-m-Y') }}</div></td>
                                                    <td>
                                                        <ul class="mb-0 d-flex flex-wrap">
                                                            <li>
                                                                <a href="#" class="btn btn-primary btn-outline-lighten__height mr-2">Ver</a>
                                                            </li>
                                                            <li>
                                                                {{-- <button type="button" onclick="modalBrandDel('{{ $brand['id'] }}', '{{ $brand['name'] }}')" class="btn btn-danger btn-outline-lighten__height" data-toggle="modal" data-target="#deleteBrandModal">Eliminar</button> --}}
                                                            </li>
                                                        </ul>
                                                    </td>
                                                
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7">No hay registros de auditoria
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
