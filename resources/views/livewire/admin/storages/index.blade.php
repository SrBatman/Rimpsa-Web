<div class="contents" style="background: #313338; color: #fff;">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12">

                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title" style=" color: #fff;"></h4>

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
                            Monitoreo almacén
                        </div>
                        <div class="card-body" style="background: #313338;  color: #fff;">

                            <div class="userDatatable global-shadow border-0 bg-white w-100">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless" style="background: #313338;  color: #fff;">
                                        <thead style="background: #313338;  color: #fff;">
                                            <tr class="userDatatable-header" style="background: #313338;  color: #fff;">
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title"  style="color:#fff;"> ID</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Temperatura</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Humedad</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Fecha-Hora</span></th>
                                                
                                                <!-- <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Fecha de pedido </span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color:#fff;">Mensaje de estado</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title float-left" style="color:#fff;">Accion</span></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($storageLogs as $log)
                                                <tr>
                                                    <td><div class="userDatatable-content" style="color:#fff;">{{ $log->id }}</div></td>
                                                    <td><div class="userDatatable-content" style="color:#fff;">{{ $log->temperatura }}</div></td>
                                                    <td><div class="userDatatable-content" style="color:#fff;">{{ $log->humedad }}</div></td>
                                                    <td><div class="userDatatable-content" style="color:#fff;">{{ $log->created_at->format('d-m-Y H:i') }}</div></td>
                                                
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7">No hay registros del almacén
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