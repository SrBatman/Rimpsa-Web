import DoublyLinkedList from '././classes/DoublyLinkedList.js';
import Product from '././classes/Product.js';

const cart = new DoublyLinkedList();
cart.loadFromCache();

// Agregar un producto
const newProduct = new Product(1, "Producto A", 100, 2);
cart.addProduct(newProduct);

// Eliminar un producto
cart.removeProduct(1);

// Obtener todos los productos
const allProducts = cart.getAllProducts();
console.log(allProducts);

// Enviar datos al servidor
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

// Enviar el carrito al servidor
sendCartToServer(cart);

document.addEventListener('DOMContentLoaded', () => {
    cart.loadFromCache();
    // Aquí puedes agregar lógica adicional para actualizar la interfaz de usuario con los productos cargados
});