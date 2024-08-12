@extends('layouts.admin')
@section('title', 'Rimpsa - Editar Categoría')
@section('content')

<div class="contents" style="background: #313338;  color: #fff;">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title" style="color: #fff;">Editar categoria</h4>

                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <div class="action-btn">
                           
                            <a href="{{ url('admin/categories') }}" class="btn btn-sm btn-danger btn-add">
                                <i class="la la-arrow-left"></i>Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CODE HERE -->
            <div class="col-lg-12 mb-30" style="background: #313338;  color: #fff;">
                <form action="{{ url('admin/categories/'.$category->id) }}" method="POST" enctype="multipart/form-data" style="background: #313338;  color: #fff;">
                @csrf
                @method('PUT')
                <input type="hidden" name="adminName" value='{{Auth::user()->name}}' autocomplete="off">
                    <div class="card" style="background: #313338;  color: #fff;">
                        <div class="card-header color-dark fw-500" style="background: #313338;  color: #fff;">
                            Editar categoria
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="a10" class="il-gray fs-14 fw-500 align-center" style=" color: #fff;">Nombre</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control ih-medium ip-light radius-xs b-light px-15" id="a10">
                                @error('name')<small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="form-group form-element-textarea mb-20">
                                <label for="exampleFormControlTextarea1" class="il-gray fs-14 fw-500 align-center" style=" color: #fff;">Descripcion</label>
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $category->description }}</textarea>
                                @error('description')<small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="form-group form-element-textarea mb-20">
                                <label for="exampleFormControlTextarea1" class="il-gray fs-14 fw-500 align-center" style=" color: #fff;">Estatus</label>
                                <div class="checkbox-theme-default custom-checkbox ">
                                    <input class="checkbox" type="checkbox" name="status" id="check-un1" {{ $category->status == '0' ? 'checked':'' }} />
                                    <label for="check-un1">
                                        <span class="checkbox-text" style=" color: #fff;">
                                            Disponible
                                        </span>
                                    </label>
                                </div>
                            </div>
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
