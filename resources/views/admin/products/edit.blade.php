@extends('layouts.admin')
@section('title', 'Rimpsa - Editar Producto')
@section('content')

<div class="contents" style="background: #313338;  color: #fff;">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title" style="color: #fff;">Editar Producto</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <div class="action-btn">
                            <a href="{{ url('admin/products') }}" class="btn btn-sm btn-danger btn-add">
                                <i class="la la-arrow-left"></i>REGRESAR</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CODE HERE -->
            <div class="col-lg-12 mb-30">

                 @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                    
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="adminName" value='{{Auth::user()->name}}' autocomplete="off">
                    <div class="card" style="background: #313338;  color: #fff;">
                        <div class="card-header color-dark fw-500" style="background: #313338;  color: #fff;">
                            Inicio
                        </div>
                        <div class="card-body">
                            

                            <div class="form-group">
                                <label for="a10" class="il-gray fs-14 fw-500 align-center" style="color: #fff;">Nombre del Producto</label>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control ih-medium ip-light radius-xs b-light px-15" id="a10">
                                @error('name')<small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="il-gray fs-14 fw-500 align-center" style="color: #fff;">Categoría</label>
                                <select class="form-control px-15" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'Selected':'' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')<small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="il-gray fs-14 fw-500 align-center" style="color: #fff;">Proveedor</label>
                                {{--<select class="form-control px-15" name="brand">
                                     @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'Selected':'' }}>{{ $brand->name }}</option>
                                    @endforeach 
                                </select>--}}
                                <input type="text" name="brand" value="{{ $product->brand }}" class="form-control ih-medium ip-light radius-xs b-light px-15" id="a10">
                                @error('brand')<small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="form-group form-element-textarea mb-20">
                                <label for="exampleFormControlTextarea1" class="il-gray fs-14 fw-500 align-center" style="color: #fff;">Descripcion</label>
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $product->description }}</textarea>
                                @error('description')<small class="text-danger">{{$message}}</small> @enderror
                            </div>
                        </div>
                    </div>


                    <div class="card mt-4" style="background: #313338;  color: #fff;">
                        <div class="card-header color-dark fw-500" style="background: #313338;  color: #fff;">
                            Detalles
                        </div>
                        <div class="card-body" style="background: #313338;  color: #fff;">
                            <div class="form-group">
                                <label for="a10" class="il-gray fs-14 fw-500 align-center" style="color: #fff;">Precio</label>
                                <input type="text" name="price" value="{{ intval($product->price) }}" class="form-control ih-medium ip-light radius-xs b-light px-15" id="a10">
                                @error('original_price')<small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            {{--<div class="form-group">
                                <label for="a10" class="il-gray fs-14 fw-500 align-center" style="color: #fff;">Precio rebajado</label>
                                <input type="number" name="selling_price" value="{{ $product->selling_price }}" class="form-control ih-medium ip-light radius-xs b-light px-15" id="a10">
                                @error('selling_price')<small class="text-danger">{{$message}}</small> @enderror
                            </div>--}}

                            <div class="form-group">
                                <label for="a10" class="il-gray fs-14 fw-500 align-center" style="color: #fff;">Cantidad</label>
                                <input type="number" name="stock" value="{{ $product->stock }}" class="form-control ih-medium ip-light radius-xs b-light px-15" id="a10">
                                @error('quantity')<small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="form-group form-element-textarea mb-20">
                                <label for="exampleFormControlTextarea1" class="il-gray fs-14 fw-500 align-center" style="color: #fff;">Estatus</label>
                         
                                <div class="checkbox-theme-default custom-checkbox ">
                                    <input class="checkbox" type="checkbox" name="status" id="check-un3" {{ $product->status == '1' ? '':'checked' }} />
                                    <label for="check-un3">
                                        <span class="checkbox-text">
                                            Disponible
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4" style="background: #313338;  color: #fff;">
                        <div class="card-header color-dark fw-500" style="background: #313338;  color: #fff;">
                            Imagen del producto
                        </div>
                        <div>
                            @if($product->image)
                            <div class="row">
                  
                                <div class="ml-5"  style="margin-top: 20px">
                                    <img src="{{ asset($product->image) }}" style="width: 150px; height: 150px;" class="me-4 border" alt="Img">
                                </div>
                           
                            </div>
                            @else
                                <h5>No se encontró ninguna imagen</h5>
                            @endif
                        </div>
                        <div class="card-body" style="background: #313338;  color: #fff;">
                            <div class="form-group form-element-textarea mb-20">
                                <div class="custom-file">
                                    <label for="exampleFormControlTextarea1" class="il-gray fs-14 fw-500 align-center" style="color: #fff;">Actualizar Imagen</label>
                                    <input class="form-control" type="file" name="image" id="image" style="background: #313338;  color: #fff;">
                                </div>
                            </div>
                        </div>
                       
                    </div>

                      <div class="layout-button mt-25">
                                <button type="submit" class="btn btn-primary btn-default btn-squared px-30">Actualizar</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
