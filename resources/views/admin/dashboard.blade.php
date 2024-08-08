@extends('layouts.admin')
@section('title', 'Admin Dashboard - DecoHogar Muebles')
@section('content')


<div class="contents" style="background: #313338;  color: #fff;">
    <div class="container-fluid" style="background: #313338;">
        <div class="row ">
            <div class="col-lg-12">

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title" style="color: #fff;">Panel</h4>
                    <!-- <div class="breadcrumb-action justify-content-center flex-wrap">
                        <div class="action-btn">
                            <div class="form-group mb-0">
                                <div class="input-container icon-left position-relative">
                                    <span class="input-icon icon-left">
                                        <span data-feather="calendar"></span>
                                    </span>
                                    <input type="text" class="form-control form-control-default date-ranger" name="date-ranger" placeholder="Oct 30, 2019 - Nov 30, 2019">
                                    <span class="input-icon icon-right">
                                        <span data-feather="chevron-down"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="action-btn">
                            <a href="" class="btn btn-sm btn-primary btn-add">
                                <i class="la la-plus"></i> Add New</a>
                        </div>
                    </div> -->
                </div>

            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $totalOrder }}</h1>
                            <p>Órdenes totales</p>
                            
                            <!-- <div class="ap-po-details-time">
                                <span class="color-success"><i class="las la-arrow-up"></i>
                                    <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="mychart8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Card 1 End -->
            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $todayOrder }}</h1>
                            <p>Pedidos de hoy</p>
                            
                            <!-- <div class="ap-po-details-time">
                                <span class="color-success"><i class="las la-arrow-up"></i>
                                    <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="mychart8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Card 1 End -->
            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $thisMonthOrder }}</h1>
                            <p>Pedidos de este mes</p>
                            
                            <!-- <div class="ap-po-details-time">
                                <span class="color-success"><i class="las la-arrow-up"></i>
                                    <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="mychart8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Card 1 End -->
            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $thisYearOrder }}</h1>
                            <p>Pedidos del año</p>
                            
                            <!-- <div class="ap-po-details-time">
                                <span class="color-success"><i class="las la-arrow-up"></i>
                                    <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="mychart8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Card 1 End -->
            </div>
            <hr>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $totalProducts }}</h1>
                            <p>Productos totales</p>
                            
                            <!-- <div class="ap-po-details-time">
                                <span class="color-success"><i class="las la-arrow-up"></i>
                                    <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="mychart8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Card 1 End -->
            </div>
            
            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">

            


                
            
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $totalCategories }}</h1>
                            <p>Categorías totales</p>
                            
                            <!-- <div class="ap-po-details-time">
                                <span class="color-success"><i class="las la-arrow-up"></i>
                                    <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $totalPayments }}</h1>
                            <p>Metodos de pago totales</p>
                            
                            <!-- <div class="ap-po-details-time">
                                <span class="color-success"><i class="las la-arrow-up"></i>
                                    <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="mychart8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Card 1 End -->
            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>0</h1>
                            <p>Paqueterias totales</p>
                            
                            <!-- <div class="ap-po-details-time">
                                <span class="color-success"><i class="las la-arrow-up"></i>
                                    <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="mychart8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Card 1 End -->
            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>0</h1>
                            <p>Marcas totales</p>
                            
                            <!-- <div class="ap-po-details-time">
                                <span class="color-success"><i class="las la-arrow-up"></i>
                                    <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="mychart8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Card 1 End -->
            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>0</h1>
                            <p>Total de sucursales</p>
                            
                            <!-- <div class="ap-po-details-time">
                                <span class="color-success"><i class="las la-arrow-up"></i>
                                    <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="mychart8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Card 1 End -->
            </div>

            <hr>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $totalAllUsers }}</h1>
                            <p>Total de usuarios</p>
                            
                            <!-- <div class="ap-po-details-time">
                                <span class="color-success"><i class="las la-arrow-up"></i>
                                    <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="mychart8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Card 1 End -->
            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $totalUser }}</h1>
                            <p>No. de usuarios</p>
                            
                            <!-- <div class="ap-po-details-time">
                                <span class="color-success"><i class="las la-arrow-up"></i>
                                    <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="mychart8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Card 1 End -->
            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $totalAdmin }}</h1>
                            <p>Numero de administradores</p>
                            
                            <!-- <div class="ap-po-details-time">
                                <span class="color-success"><i class="las la-arrow-up"></i>
                                    <strong>25%</strong></span>
                                <small>Since last week</small>
                            </div> -->
                        </div>
                    </div>

                    <!-- <div class="ap-po-timeChart">
                        <div class="overview-single__chart d-md-flex align-items-end">
                            <div class="parentContainer">
                                <div>
                                    <canvas id="mychart8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Card 1 End -->
            </div>
        </div>
        <!-- ends: .row -->
    </div>

</div>

@endsection
