

function modalProductDel(productId, productName) {
  Swal.fire({
    title: '¿Estás seguro?',
    html: `Estas a punto de eliminar el producto:<br>\n${productName}.`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, eliminar!',
    cancelButtonText: 'No, cancelar!'
  }).then((result) => {
    if (result.isConfirmed) deleteProduct(productId);
    
  });
}

function deleteProduct(productId) {
  // Example AJAX call to delete the product
  const splitedName = window.adminName.split(' ')
  const adminNames = `${splitedName[0]} ${splitedName[1]}`;

  fetch(`/admin/products/${productId}`, {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({ adminName: adminNames })
  })
    .then(response => response.json())
    .then(data => {
      
      if (data.success) {
        Swal.fire(
          '¡Eliminado!',
          'Producto eliminado con exito.',
          'success'
        ).then(() => {
          // Optionally, reload the page or remove the product from the UI
          location.reload();
        });
      } else {
        Swal.fire(
          'Error!',
          'Algo ha salido mal.',
          'error'
        );
      }
    })
    .catch(error => {
      Swal.fire(
        'Error!',
        'Algo ha salido mal.',
        'error'
      );
    });
}

function modalProductAdd() {
  const splitedName = window.adminName.split(' ')
  const adminNames = `${splitedName[0]} ${splitedName[1]}`;
  

  fetch('/api/categories')
    .then(response => response.json())
    .then(categories => {
      // Construir el HTML del <select> con las categorías
      let selectOptions = '';
      categories.forEach(category => {
        selectOptions += `<option value="${category.id}">${category.name}</option>`;
      });

      fetch('/api/brands').then(res => res.json()).then(brands => {
        let selectOptionsBrands = '';
        brands.forEach((brand) => {
          selectOptionsBrands += `<option value="${brand.name}">${brand.name}</option>`;

          });
          if (!brands.length) selectOptionsBrands += `<option value="">Sin marcas aún</option>`;
          console.log(selectOptionsBrands);
          Swal.fire({
            title: "Nuevo producto",
            html: `
              <form id="product-form" action="/admin/products" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="adminName" value="${adminNames}" autocomplete="off">
              <input type="hidden" name="_token" value=${document.querySelector('meta[name="csrf-token"]').getAttribute('content')} autocomplete="off">
              <div class="form-floating">
              <label for="name" style="color: #fff;">Nombre</label>
              <input id="name" name="name" class="swal2-input">
              </div>
              <div class="form-floating">
              <label for="brand" style="color: #fff;">Marca</label>
              <select id="brand" name="brand" class="swal2-input">
              ${selectOptionsBrands}
              </select>
              </div>
              <div class="form-floating">
              <label for="category" style="color: #fff;">Categoría</label>
              <select id="category_id" name="category_id" class="swal2-input">
              ${selectOptions}
              </select>
              </div>
              <div class="form-floating">
              <label for="description" style="color: #fff;">Descripción</label>
              <input id="description" name="description" class="swal2-input">
              </div>
              <div class="form-floating">
              <label for="price" style="color: #fff;">Precio</label>
              <input id="price" name="price" class="swal2-input">
              </div>
              <div class="form-floating">
              <label for="stock" style="color: #fff;">Cantidad</label>
               <div>
              <input id="stock" type="number" name="stock" class="swal2-input" style="width: 372px !important;">
               </div>
              </div>
              <div class="form-floating">
              <label for="image" style="color: #fff;">Imagen</label>
              <div>
              <!-- Botón personalizado -->
              <button type="button" class="btn btn-primary" onclick="document.getElementById('image').click();">
                  Seleccionar Imagen
              </button>
              <input type="file" id="image" name="image" class="custom-file-input">
              <span id="file-name" style="color: #fff;">No se ha seleccionado ningún archivo</span>
              </div>
              </div>
              </form>
            `,
            customClass: {
              popup: 'custom-swal-popup'
            },
            showCancelButton: true,
            confirmButtonColor: '#2a913a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, agregar!',
            cancelButtonText: 'No, cancelar!',
            preConfirm: () => {
              const form = document.getElementById('product-form');
              const name = form.querySelector('#name').value.trim();
              const brand = form.querySelector('#brand').value.trim();
              const category_id = form.querySelector('#category_id').value;
              const description = form.querySelector('#description').value.trim();
              const price = form.querySelector('#price').value.trim();
              const stock = form.querySelector('#stock').value.trim();
              const image = form.querySelector('#image').files.length;
    
              // Validaciones personalizadas
              if (!name || !brand || !category_id || !description || !price || !stock || !image) {
                Swal.showValidationMessage('Todos los campos son obligatorios.');
                return false;
              }
              if (isNaN(price) || parseFloat(price) <= 0) {
                Swal.showValidationMessage('El precio debe ser un número positivo.');
                return false;
              }
              if (isNaN(stock) || parseInt(stock) <= 0) {
                Swal.showValidationMessage('La cantidad debe ser un número entero positivo.');
                return false;
              }
    
              // Si todo está bien, se envía el formulario
              return form.submit();
            }
          });
    
          document.getElementById('image').addEventListener('change', function() {
            
            let fileName = this.files[0] ? this.files[0].name : 'No se ha seleccionado ningún archivo';
            document.getElementById('file-name').textContent = fileName;
        });
    

      })

      
    });   // Fin del fetch de categorías

}


function modalCategoryDel(categoryId, categoryName) {
  Swal.fire({
    title: '¿Estás seguro?',
    html: `<div>Estas a punto de eliminar la categoría:<br>\n${categoryName}.</div>
    <div>Eliminar una categoría también eliminará todos los productos asociados a ella.</div>`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, eliminar!',
    cancelButtonText: 'No, cancelar!'
  }).then((result) => {
    if (result.isConfirmed) deleteCategory(categoryId);
    
  });
}


function deleteCategory(categoryId) {
  const splitedName = window.adminName.split(' ')
  const adminNames = `${splitedName[0]} ${splitedName[1]}`;
  
  fetch(`/admin/categories/${categoryId}`, {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({ adminName: adminNames })
  })
    .then(response => response.json())
    .then(data => {
      
      if (data.success) {
        Swal.fire(
          '¡Eliminado!',
          'Categoría eliminada con exito.',
          'success'
        ).then(() => {
          // Optionally, reload the page or remove the product from the UI
          location.reload();
        });
      } else {
        Swal.fire(
          'Error!',
          'Algo ha salido mal.',
          'error'
        );
      }
    })
    .catch(error => {
      Swal.fire(
        'Error!',
        'Algo ha salido mal.',
        'error'
      );
    });
}



function modalCategoryAdd() {
  const splitedName = window.adminName.split(' ')
  const adminNames = `${splitedName[0]} ${splitedName[1]}`;

  Swal.fire({
    title: "Nueva categoría",
    html: `
      <form id="product-form" action="/admin/categories" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="adminName" value="${adminNames}" autocomplete="off">
      <input type="hidden" name="_token" value=${document.querySelector('meta[name="csrf-token"]').getAttribute('content')} autocomplete="off">
      <div class="form-floating">
      <label for="name" style="color: #fff;">Nombre</label>
      <input id="name" name="name" class="swal2-input">
      </div>
      <div class="form-floating">
      <label for="description" style="color: #fff;">Descripción</label>
      <input id="description" name="description" class="swal2-input">
      </div>
      </form>
    `,
    customClass: {
      popup: 'custom-swal-popup'
    },
    showCancelButton: true,
    confirmButtonColor: '#2a913a',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, agregar!',
    cancelButtonText: 'No, cancelar!',
    preConfirm: () => {
      const form = document.getElementById('product-form');
      const name = form.querySelector('#name').value.trim();
      const description = form.querySelector('#description').value.trim();

      // Validaciones personalizadas
      if (!name || !description) {
        Swal.showValidationMessage('Todos los campos son obligatorios.');
        return false;
      }
 

      // Si todo está bien, se envía el formulario
      return form.submit();
    }

  });

}


function modalBrandDel(brandId, brandName) {
  Swal.fire({
    title: '¿Estás seguro?',
    html: `<div>Estas a punto de eliminar la marca:<br>\n${brandName}.</div>`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, eliminar!',
    cancelButtonText: 'No, cancelar!'
  }).then((result) => {
    if (result.isConfirmed) deleteBrand(brandId);
    
  });
}


function deleteBrand(brandId) {
  const splitedName = window.adminName.split(' ')
  const adminNames = `${splitedName[0]} ${splitedName[1]}`;

  fetch(`/admin/brands/${brandId}`, {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({ adminName: adminNames })
  })
    .then(response => response.json())
    .then(data => {
      
      if (data.success) {
        Swal.fire(
          '¡Eliminado!',
          'Marca eliminada con exito.',
          'success'
        ).then(() => {
          // Optionally, reload the page or remove the product from the UI
          location.reload();
        });
      } else {
        Swal.fire(
          'Error!',
          'Algo ha salido mal.',
          'error'
        );
      }
    })
    .catch(error => {
      Swal.fire(
        'Error!',
        'Algo ha salido mal.',
        'error'
      );
    });
}


function modalBrandAdd() {
  const splitedName = window.adminName.split(' ')
  const adminNames = `${splitedName[0]} ${splitedName[1]}`;

  Swal.fire({
    title: "Nueva marca",
    html: `
      <form id="product-form" action="/admin/brands" method="POST">\
      <input type="hidden" name="adminName" value="${adminNames}" autocomplete="off">
      <input type="hidden" name="_token" value=${document.querySelector('meta[name="csrf-token"]').getAttribute('content')} autocomplete="off">
      <div class="form-floating">
      <label for="name" style="color: #fff;">Nombre</label>
      <input id="name" name="name" class="swal2-input">
      </div>
      </form>
    `,
    customClass: {
      popup: 'custom-swal-popup'
    },
    showCancelButton: true,
    confirmButtonColor: '#2a913a',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, agregar!',
    cancelButtonText: 'No, cancelar!',
    preConfirm: () => {
      const form = document.getElementById('product-form');
      const name = form.querySelector('#name').value.trim();

      // Validaciones personalizadas
      if (!name ) {
        Swal.showValidationMessage('Todos los campos son obligatorios.');
        return false;
      }
 
      return form.submit();
    }

  });

}



function modalUserDel(userId, userName) {
  Swal.fire({
    title: '¿Estás seguro?',
    html: `<div>Estas a punto de eliminar el usuario:<br>\n${userName}.</div>`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, eliminar!',
    cancelButtonText: 'No, cancelar!'
  }).then((result) => {
    if (result.isConfirmed) deleteUser(userId);
    
  });
}


function deleteUser(userId) {
  const splitedName = window.adminName.split(' ')
  const adminNames = `${splitedName[0]} ${splitedName[1]}`;

  fetch(`/admin/users/${userId}`, {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({ adminName: adminNames })
  })
    .then(response => response.json())
    .then(data => {
      
      if (data.success) {
        Swal.fire(
          '¡Eliminado!',
          'Usuario eliminado con exito.',
          'success'
        ).then(() => {
          // Optionally, reload the page or remove the product from the UI
          location.reload();
        });
      } else {
        Swal.fire(
          'Error!',
          'Algo ha salido mal.',
          'error'
        );
      }
    })
    .catch(error => {
      Swal.fire(
        'Error!',
        'Algo ha salido mal.',
        'error'
      );
    });
}


function modalUserAdd() {
  const splitedName = window.adminName.split(' ')
  const adminNames = `${splitedName[0]} ${splitedName[1]}`;


  Swal.fire({
    title: "Nueva usuario",
    html: `
      <form id="product-form" action="/admin/users" method="POST">\
      <input type="hidden" name="adminName" value="${adminNames}" autocomplete="off">
      <input type="hidden" name="_token" value=${document.querySelector('meta[name="csrf-token"]').getAttribute('content')} autocomplete="off">
      <div class="form-floating">
      <label for="name" style="color: #fff;">Nombre</label>
      <input id="name" name="name" class="swal2-input">
      </div>
      <div class="form-floating">
      <label for="name" style="color: #fff;">Email</label>
      <input id="email" name="email" class="swal2-input">
      </div>
      <div class="form-floating">
      <label for="name" style="color: #fff;">Contraseña</label>
      <input id="password" name="password" class="swal2-input">
      </div>
      <div class="form-floating">
      <label for="name" style="color: #fff;">Rol</label>
       <select id="role_as" name="role_as" class="swal2-input">
      <option value="1">Administrador</option>
      <option value="0">Usuario</option>
      </select>
      </div>
      </form>
    `,
    customClass: {
      popup: 'custom-swal-popup'
    },
    showCancelButton: true,
    confirmButtonColor: '#2a913a',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, agregar!',
    cancelButtonText: 'No, cancelar!',
    preConfirm: () => {
      const form = document.getElementById('product-form');
      const name = form.querySelector('#name').value.trim();

      // Validaciones personalizadas
      if (!name ) {
        Swal.showValidationMessage('Todos los campos son obligatorios.');
        return false;
      }
 
      return form.submit();
    }

  });

}