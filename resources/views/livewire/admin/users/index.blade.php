
<style>
    ::-webkit-scrollbar {
        width: 12px;
        /* Ancho del scrollbar */
    }

    /* Estilo de la "pista" del scrollbar */
    ::-webkit-scrollbar-track {
        background: #313338;
        border-radius: 10px;
        /* Redondeado de la pista */
    }

    /* Estilo del "thumb" (la parte que se arrastra) */
    ::-webkit-scrollbar-thumb {
        background-color: #19191a;
        border-radius: 10px;
        /* Redondeado del thumb */
        border: 3px solid #313338;
        /* Espacio entre el thumb y la pista */
    }

    /* Opcional: hover sobre el thumb */
    ::-webkit-scrollbar-thumb:hover {
        background-color: #555;
        /* Color al pasar el mouse sobre el thumb */
    }

    .custom-swal-popup {
        max-height: 80vh;
        overflow-y: auto;
    }

    #category-form {
        margin-top: 10px;
    }

    #category-select {
        width: 100%;
        height: 35px;
    }

    .custom-file-input {
        display: none;

    }
</style>
    <div class="contents" style="background: #313338;  color: #fff;">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12" style="background: #313338;  color: #fff;">
                    <div class="breadcrumb-main" style="background: #313338;  color: #fff;">
                        <h4 class="text-capitalize breadcrumb-title" style="background: #313338;  color: #fff;">Usuarios</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <a href="#" class="btn btn-sm btn-primary btn-add btn-add-user">
                                    <i class="la la-plus"></i>Agregar Usuarios</a>
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
                            Usuarios
                        </div>
                        <div class="card-body" style="background: #313338;  color: #fff;">
                            <div class="userDatatable global-shadow border-0 bg-white w-100" style="background: #313338;  color: #fff;">
                                <div class="table-responsive" style="background: #313338;  color: #fff;">
                                    <table class="table mb-0 table-borderless" style="background: #313338;  color: #fff;">
                                        <thead style="background: #313338;  color: #fff;">
                                            <tr class="userDatatable-header" style="background: #313338;  color: #fff;">
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color: #fff;">ID</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color: #fff;">Nombre</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color: #fff;">Email</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color: #fff;">Rol</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title float-left" style="color: #fff;">Acción</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $user)
                                                <tr>
                                                    <td><div class="userDatatable-content" style="color: #fff;">{{ $user->id }}</div></td>
                                                    <td><div class="userDatatable-content" style="color: #fff;">{{ $user->name }}</div></td>
                                                    <td><div class="userDatatable-content" style="color: #fff;">{{ $user->email }}</div></td>
                                                    <td>
                                                        <div class="userDatatable-content d-inline-block">
                                                            @if ($user->role_as  == '0')
                                                                <span class="bg-opacity-primary color-primary rounded-pill userDatatable-content-status active">User</span>
                                                            @elseif ($user->role_as  == '1')
                                                                <span class="bg-opacity-success color-success rounded-pill userDatatable-content-status active">Admin</span>
                                                            @else
                                                                <span class="bg-opacity-danger color-danger rounded-pill userDatatable-content-status active">NINGUNO</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <ul class="mb-0 d-flex flex-wrap">
                                                            <li>
                                                                <a href="{{ url('admin/users/edit/'.$user->id) }}" class="btn btn-primary btn-outline-lighten__height mr-2">Editar</a>
                                                            </li>
                                                            <li>
                                                                <button type="button" onclick="modalUserDel('{{ $user->id }}', '{{ $user->name }}')" class="btn btn-danger btn-outline-lighten__height" data-toggle="modal" data-target="#deleteModal">Eliminar</button>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">No hay usuarios disponibles</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="mt-3 float-right">
                                        {{ $users->links() }}
                                    </div>
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
        const addButton = document.querySelector('.btn-add-user');

        // Asegúrate de que el enlace existe en la página
        if (addButton) {
            addButton.addEventListener('click', function(event) {
                // Evita el comportamiento predeterminado del enlace (navegar a una URL)
                event.preventDefault();
                modalUserAdd();
               
            });
        }
    });
    
 
</script>