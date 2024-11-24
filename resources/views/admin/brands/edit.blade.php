@extends('layouts.admin')
@section('title', 'Rimpsa - Editar Proovedor')
@section('content')

<div class="contents" style="background: #313338;  color: #fff;">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title" style="color: #fff;">Editar proveedor</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <div class="action-btn">
                           
                            <a href="{{ url('admin/brands') }}" class="btn btn-sm btn-danger btn-add">
                                <i class="la la-arrow-left"></i>Regresar</a>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger mb-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <!-- CODE HERE -->
    
         
            <div class="col-lg-12 mb-30" style="background: #313338;  color: #fff;">
                <form action="{{ url('admin/brands/'.$brand->id) }}" method="POST" enctype="multipart/form-data" style="background: #313338;  color: #fff;">
                @csrf
                @method('PUT')
                <input type="hidden" name="adminName" value='{{Auth::user()->name}}' autocomplete="off">
                    <div class="card" style="background: #313338;  color: #fff;">
                        <div class="card-header color-dark fw-500" style="background: #313338;  color: #fff;">
                            Editar proovedor
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="a10" class="il-gray fs-14 fw-500 align-center" style=" color: #fff;">Nombre</label>
                                <input type="text" name="name" value="{{ $brand->name }}" class="form-control ih-medium ip-light radius-xs b-light px-15" id="a10" required>
                                @error('name')<small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="form-group">
                                <label for="a10" class="il-gray fs-14 fw-500 align-center" style=" color: #fff;">Contacto</label>
                                <input type="text" name="contact" value="{{ $brand->contact }}" class="form-control ih-medium ip-light radius-xs b-light px-15" id="a10" required>
                                @error('name')<small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            {{-- <div class="form-group form-element-textarea mb-20">
                                <label for="exampleFormControlTextarea1" class="il-gray fs-14 fw-500 align-center" style=" color: #fff;">Estatus</label>
                                <div class="checkbox-theme-default custom-checkbox ">
                                    <input class="checkbox" type="checkbox" name="status" id="check-un1" {{ $brand->status == '0' ? 'checked':'' }} />
                                    <label for="check-un1">
                                        <span class="checkbox-text" style=" color: #fff;">
                                            Disponible
                                        </span>
                                    </label>
                                </div>
                            </div> --}}
                            <div class="layout-button mt-25">
                                <button type="submit" class="btn btn-primary btn-default btn-squared px-30">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
