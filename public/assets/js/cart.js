import DoublyLinkedList from '././classes/Doublylinkedlist.js';
import Product from '././classes/Product.js';

document.addEventListener('livewire:init', function () {
    
    Livewire.on('productAdded', (product) => {

       

        const cart = new DoublyLinkedList();
        console.log('Se ejecuta el evento de livewire');
        cart.loadFromCache();
        const newProduct = new Product(product[0].id, product[0].name, product[0].price, product[0].quantity, product[0].image, product[0].description, product[0].slug);
        cart.addProduct(newProduct);
        cart.saveToCache();
        showCartQuantity();

        Toastify({
            text: `• Producto agregado con éxito.`,
            duration: 4000,
            destination: "https://github.com/apvarun/toastify-js",
            newWindow: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
              background: "#177323",
            },
            onClick: function(){} // Callback after click
          }).showToast();

        // sendCartToServer(cart);
    });
});



const cartTotalElement = document.getElementById('cart-quantity-template');

const showCartQuantity = () => {
    
    const cart = new DoublyLinkedList();
    cart.loadFromCache();
    const allProducts = cart.getAllProducts();


    cartTotalElement.textContent = `Carrito (${allProducts.length})`;
};




const sendCartToServer = async (cart) => {
    const response = await fetch('/cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ cart: cart.getAllProducts() })
    });
    const data = await response.json();
    console.log(data);
};

console.log('Probando el carrito de compras');































// const cart = new DoublyLinkedList();
// cart.loadFromCache();

// // Agregamos un producto uwu
// const newProduct = new Product(1, "Producto A", 100, 2);
// cart.addProduct(newProduct);

// // Eliminanado un producto owo
// cart.removeProduct(1);

// // Obtener todos los productos
// const allProducts = cart.getAllProducts();
// console.log(allProducts);

// // Enviar datos al servidor de laravel
// const sendCartToServer = async (cart) => {
//     // Enviar el carrito al controlador de php en caso de usar la base de datos (Usuario logeado)
//     const response = await fetch('/cart', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//         },
//         body: JSON.stringify({ cart: cart.getAllProducts() })
//     });
//     const data = await response.json();
//     console.log(data);
// };

// sendCartToServer(cart);

// document.addEventListener('DOMContentLoaded', () => {
//     cart.loadFromCache();
//     // Aqui vamos a poner para actualizar la interfaz al agregar un producto al carrito
// });
