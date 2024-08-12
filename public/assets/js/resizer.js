
import DoublyLinkedList from '././classes/DoublyLinkedList.js';
import Product from '././classes/Product.js';

document.addEventListener('DOMContentLoaded', () => {
    const cart = new DoublyLinkedList();
    cart.loadFromCache();


    const spaceSection = document.getElementById('check-section-uwu');



    const updateCartDisplay = () => {
        
        const allProducts = cart.getAllProducts();
        let total = 0;

        if (allProducts.length === 0) {
            spaceSection.style.height = '600px';
        } else {
            console.log('Se ejecuta el else');
        }
    };

    updateCartDisplay();

});