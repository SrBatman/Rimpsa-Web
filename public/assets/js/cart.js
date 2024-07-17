import DoublyLinkedList from '././classes/DoublyLinkedList.js';
import Product from '././classes/Product.js';

const cart = new DoublyLinkedList();
cart.loadFromCache();

// Agregamos un producto uwu
const newProduct = new Product(1, "Producto A", 100, 2);
cart.addProduct(newProduct);

// Eliminanado un producto owo
cart.removeProduct(1);

// Obtener todos los productos
const allProducts = cart.getAllProducts();
console.log(allProducts);

// Enviar datos al servidor de laravel
const sendCartToServer = async (cart) => {
    // Enviar el carrito al controlador de php en caso de usar la base de datos (Usuario logeado)
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

sendCartToServer(cart);

document.addEventListener('DOMContentLoaded', () => {
    cart.loadFromCache();
    // Aqui vamos a poner para actualizar la interfaz al agregar un producto al carrito
});