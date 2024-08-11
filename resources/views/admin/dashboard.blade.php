@extends('layouts.admin')
@section('title', 'Rimpsa – Refacciones para maquinaria pesada')
@section('content')


<div class="contents" style="background: #313338;  color: #fff;">
    <div class="container-fluid" style="background: #313338;">
        <div class="row ">
            <div class="col-lg-12">

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title" style="color: #fff;">Panel administrativo</h4>
                 
                </div>

            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $totalOrder }}</h1>
                            <p style="color:#000;">Órdenes totales</p>
                         
                        </div>
                    </div>

                </div>
                <!-- Card 1 End -->
            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $todayOrder }}</h1>
                            <p style="color:#000;">Pedidos de hoy</p>
                         
                        </div>
                    </div>
                </div>
                <!-- Card 1 End -->
            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $thisMonthOrder }}</h1>
                            <p style="color:#000;">Pedidos de este mes</p>
                            
                        </div>
                    </div>
                </div>
                <!-- Card 1 End -->
            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $thisYearOrder }}</h1>
                            <p style="color:#000;">Pedidos del año</p>
                            
            
                        </div>
                    </div>
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
                            <p style="color:#000;">Productos totales</p>
                            
                        </div>
                    </div>

                </div>
                <!-- Card 1 End -->
            </div>
            
            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">

            


                
            
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $totalCategories }}</h1>
                            <p style="color:#000;">Categorías totales</p>
                            
                        
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
                            <p style="color:#000;">Metodos de pago totales</p>
                            
                        </div>
                    </div>

                </div>
                <!-- Card 1 End -->
            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>0</h1>
                            <p style="color:#000;">No. Registros</p>
                    
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
                            <h1>{{ $totalBrands }}</h1>
                            <p style="color:#000;">Marcas totales</p>
                            
                        </div>
                    </div>

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
                            <p style="color:#000;">Total de usuarios</p>
                           
                        </div>
                    </div>

                </div>
                <!-- Card 1 End -->
            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $totalUser }}</h1>
                            <p style="color:#000;">No. de usuarios</p>
                            
                        </div>
                    </div>

                </div>
                <!-- Card 1 End -->
            </div>

            <div class="col-xxl-3 col-md-6 col-ssm-12 mb-30">
                <!-- Card 1 -->
                <div class="ap-po-details p-25 radius-xl bg-white d-flex justify-content-between">
                    <div>
                        <div class="overview-content">
                            <h1>{{ $totalAdmin }}</h1>
                            <p style="color:#000;">Numero de administradores</p>
    
                        </div>
                    </div>

    
                </div>
                <!-- Card 1 End -->
            </div>
        </div>
        <!-- ends: .row -->
    </div>

</div>

@endsection
