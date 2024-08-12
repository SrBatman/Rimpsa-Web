@extends('layouts.admin')
@section('title', 'Rimpsa - Editar Usuario')
@section('content')

<div class="contents" style="background: #313338;  color: #fff;">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title" style="background: #313338;  color: #fff;">Editar Usuario</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <div class="action-btn">
                            <a href="{{ url('admin/users') }}" class="btn btn-sm btn-danger btn-add">
                                <i class="la la-arrow-left"></i>Regresar</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CODE HERE -->
            <div class="col-lg-12 mb-30" style="background: #313338;  color: #fff;">
                <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="adminName" value='{{Auth::user()->name}}' autocomplete="off">
                    <div class="card" style="background: #313338;  color: #fff;">
                        <div class="card-header color-dark fw-500" style="background: #313338;  color: #fff;">
                            Edit User
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="a10" class="il-gray fs-14 fw-500 align-center" style=" color: #fff;">Nombre</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control ih-medium ip-light radius-xs b-light px-15" id="a10">
                                @error('name')<small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="form-group">
                                <label for="a10" class="il-gray fs-14 fw-500 align-center" style=" color: #fff;">Email</label>
                                <input type="text" name="email" readonly value="{{ $user->email }}" class="form-control ih-medium ip-light radius-xs b-light px-15" id="a10">
                                @error('email')<small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="form-group">
                                <label for="a10" class="il-gray fs-14 fw-500 align-center" style=" color: #fff;">Contraseña</label>
                                <input type="text" name="password" class="form-control ih-medium ip-light radius-xs b-light px-15" id="a10">
                                @error('password')<small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="il-gray fs-14 fw-500 align-center" style=" color: #fff;">Rol:</label>
                                <select name="role_as" class="form-control px-15">
                                    <option value="">Select Role</option>
                                    <option value="0" {{ $user->role_as == '0' ? 'selected':'' }}>Usuario</option>
                                    <option value="1" {{ $user->role_as == '1' ? 'selected':'' }}>Administrador</option>
                                </select>
                                @error('role_as')<small class="text-danger">{{$message}}</small> @enderror
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
