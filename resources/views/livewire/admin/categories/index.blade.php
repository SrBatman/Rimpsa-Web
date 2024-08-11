    <div class="contents" style="background: #313338;  color: #fff;">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title" style="color: #fff;">Categorias</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <a href="" class="btn btn-sm btn-primary btn-add btn-add-category">
                                    <i class="la la-plus"></i>Agregar Categoria</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CODE HERE -->
                <div class="col-lg-12 mb-30">
                    @if (session('message'))
                        <div class="alert alert-success mb-3" style="color: #056800">{{ session('message') }}</div>
                    @endif
                    <div class="card" style="background: #313338;  color: #fff;">
                        <div class="card-header color-dark fw-500" style="background: #313338;  color: #fff;">
                            Categories
                        </div>
                        <div class="card-body" style="background: #313338;  color: #fff;">
                            <div class="userDatatable global-shadow border-0 bg-white w-100" style="background: #313338;  color: #fff;">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless" style="background: #313338;  color: #fff;">
                                        <thead style="background: #313338;  color: #fff;">
                                            <tr class="userDatatable-header" style="background: #313338;  color: #fff;">
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color: #fff;">ID</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color: #fff;">Nombre</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title" style="color: #fff;">Estatus</span></th>
                                                <th style="background: #313338;  color: #fff;"><span class="userDatatable-title float-left" style="color: #fff;">Acción</span></th>
                                            </tr>
                                        </thead>
                                        <tbody style="background: #313338;  color: #fff;">
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td><div class="userDatatable-content" style="color: #bbbbbb;">{{ $category->id }}</div></td>
                                                    <td style="background: #313338;  color: #fff;"><div class="userDatatable-content" style="color: #bbbbbb;">{{ $category->name }}</div></td>
                                                    <td style="background: #313338;  color: #fff;">
                                                        <div class="userDatatable-content d-inline-block">
                                                            @if ($category->status == '1')
                                                                <span class="bg-opacity-danger color-danger rounded-pill userDatatable-content-status active">{{ $category->status == '1' ? 'Oculto':'Visible' }}</span>
                                                            @else
                                                                <span class="bg-opacity-success color-success rounded-pill userDatatable-content-status active" style="color: #fff;">{{ $category->status == '1' ? 'Oculto':'Visible' }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td style="background: #313338;  color: #fff;">
                                                        <ul class="mb-0 d-flex flex-wrap">
                                                            <li>
                                                                <a href="{{ url('admin/categories/edit/'.$category->id.'') }}" class="btn btn-primary btn-outline-lighten__height mr-2">Edit</a>
                                                            </li>
                                                            <li>
                                                                <button type="button" onclick="modalCategoryDel('{{ $category->id }}', '{{ $category->name }}')" class="btn btn-danger btn-outline-lighten__height" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                                                
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
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

</div>


<script src="{{ asset('assets/js/alerts.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Selecciona el enlace usando la clase 'btn-add'
        const addButton = document.querySelector('.btn-add-category');

        // Asegúrate de que el enlace existe en la página
        if (addButton) {
            addButton.addEventListener('click', function(event) {
                // Evita el comportamiento predeterminado del enlace (navegar a una URL)
                event.preventDefault();
                modalCategoryAdd();
               
            });
        }
    });
    
 
</script>