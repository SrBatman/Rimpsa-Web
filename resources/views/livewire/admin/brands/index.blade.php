<div class="contents" style="background: #313338;  color: #fff;">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title" style="color: #fff;">Proveedor</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <div class="action-btn">
                            <button type="button" class="btn btn-sm btn-primary btn-add btn-add-brand" data-toggle="modal" data-target="#addBrandModal">
                                <i class="la la-plus"></i>Agregar Proveedor</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CODE HERE -->
            <div class="col-lg-12 mb-30">
                @if (session('message'))
                    <div class="alert alert-success mb-3" style="color: #056800">{{ session('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header color-dark fw-500" style="background: #313338;  color: #fff;">
                        Marcas
                    </div>
                    <div class="card-body" style="background: #313338;  color: #fff;">
                        <div class="userDatatable global-shadow border-0 bg-white w-100">
                            <div class="table-responsive" style="background: #313338;  color: #fff;">
                                <table class="table mb-0 table-borderless" style="background: #313338;  color: #fff;">
                                    <thead style="background: #313338;  color: #fff;">
                                        <tr class="userDatatable-header" style="background: #313338;  color: #fff;">
                                            <th style="background: #313338;"><span class="userDatatable-title" style="color: #fff;">ID</span></th>
                                            <th style="background: #313338;"><span class="userDatatable-title" style="color: #fff;">Nombre</span></th>
                                            <th style="background: #313338;"><span class="userDatatable-title" style="color: #fff;">Contacto</span></th>
                                            <th style="background: #313338;"><span class="userDatatable-title float-left" style=" color: #fff;">Acción</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($brands as $brand)
                                            <tr>
                                                <td><div class="userDatatable-content" style="color: #fff;">{{ $brand['id'] }}</div></td> <!-- Cambiar '->id' a '[$brand['id']] -->
                                                <td><div class="userDatatable-content" style="color: #fff;">{{ $brand['name'] }}</div></td> <!-- Cambiar '->name' a '[$brand['name']] -->
                                                <td><div class="userDatatable-content" style="color: #fff; text-transform: none;">{{ $brand['contact'] }}</div></td> <!-- Cambiar '->contact' a '[$brand['contact']] -->
                                                <td>
                                                    <ul class="mb-0 d-flex flex-wrap">
                                                        <li>
                                                            <a href="{{ url('admin/brands/edit/'.$brand['id']) }}" class="btn btn-primary btn-outline-lighten__height mr-2">Editar</a>
                                                        </li>
                                                        <li>
                                                            <button type="button" onclick="modalBrandDel('{{ $brand['id'] }}', '{{ $brand['name'] }}')" class="btn btn-danger btn-outline-lighten__height" data-toggle="modal" data-target="#deleteBrandModal">Eliminar</button>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" style="background: #313338;  color: #fff;">No se encontraron Proveedores</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-3 float-right">
                                    {{-- {{ $brands->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="{{ asset('assets/js/alerts.js') }}"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Selecciona el enlace usando la clase 'btn-add'
        const addButton = document.querySelector('.btn-add-brand');

        // Asegúrate de que el enlace existe en la página
        if (addButton) {
            addButton.addEventListener('click', function(event) {
                // Evita el comportamiento predeterminado del enlace (navegar a una URL)
                event.preventDefault();
                modalBrandAdd();
               
            });
        }
    });
    
 
</script>

