import DoublyLinkedList from '././classes/Doublylinkedlist.js';
import Product from '././classes/Product.js';

document.addEventListener('livewire:init', function () {
    Livewire.on('productAdded', (product) => {
        const cart = new DoublyLinkedList();
        console.log('Se ejecuta el evento de livewire');
        cart.loadFromCache();
        const newProduct = new Product(
            product[0].id,
            product[0].name,
            product[0].price,
            product[0].quantity,
            product[0].image,
            product[0].description,
            product[0].slug
        );
        cart.addProduct(newProduct);
        cart.saveToCache();
        showCartQuantity();

        Toastify({
            text: `• Producto agregado con éxito.`,
            duration: 4000,
            newWindow: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "#177323",
            },
            onClick: function() {} // Callback after click
        }).showToast();
        // console.log(window.isAuthenticated);
        // if (window.isAuthenticated) {
            
        //     console.log('Usuario logueado, se envía el carrito al servidor.');
        //     sendCartToServer(cart);
        // } else {
        //     console.log('Usuario no logueado, no se envía el carrito al servidor.');
        // }
    });
});

const cartTotalElement = document.getElementById('cart-quantity-template');

const showCartQuantity = () => {
    const cart = new DoublyLinkedList();
    cart.loadFromCache();
    const allProducts = cart.getAllProducts();
    cartTotalElement.textContent = `Carrito (${allProducts.length})`;
};
