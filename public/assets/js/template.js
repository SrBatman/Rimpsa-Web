import DoublyLinkedList from '././classes/DoublyLinkedList.js';
import Product from '././classes/Product.js';


document.addEventListener('DOMContentLoaded', () => {
    
    const cart = new DoublyLinkedList();
    cart.loadFromCache();

    const cartTotalElement = document.getElementById('cart-quantity-template');

    const showCartQuantity = () => {
        const allProducts = cart.getAllProducts();


        cartTotalElement.textContent = `Carrito (${allProducts.length})`;
    };

    showCartQuantity();

});