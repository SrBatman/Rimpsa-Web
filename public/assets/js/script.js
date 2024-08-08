// import DoublyLinkedList from '././classes/DoublyLinkedList.js';
// import Product from '././classes/Product.js';

// document.addEventListener('DOMContentLoaded', () => {
//     const cart = new DoublyLinkedList();
//     cart.loadFromCache();

//     const cartItemsContainer = document.getElementById('products-resume');
//     const cartTotalElement = document.getElementById('cart-total');
//     const emptyCartMessage = document.getElementById('empty-cart-message');
//     const productsTable = document.getElementById('products-table');
//     const clearCartButton = document.getElementById('clear-cart-button');
//     const scrollContainer = document.getElementById('contenedor-con-scroll');
//     const spaceSection = document.getElementById('space-section');
    

//     const updateCartDisplay = () => {
//         cartItemsContainer.innerHTML = '';
//         const allProducts = cart.getAllProducts();
//         let total = 0;

//         if (allProducts.length === 0) {
//             emptyCartMessage.style.display = 'block';
//             productsTable.style.display = 'none';
//             clearCartButton.style.display = 'none';
   
//         } else {
//             emptyCartMessage.style.display = 'none';
//             productsTable.style.display = 'table';
//             productsTable.style.position = 'relative';

            
//             productsTable.style.top = '60px';
//             clearCartButton.style.display = 'block';
//             clearCartButton.style.position = 'relative';
//             clearCartButton.style.left = '235px';
//             clearCartButton.style.top = '100px';

//             if (allProducts.length > 4) scrollContainer.style.overflowY = 'auto';
//             if (allProducts.length > 4) spaceSection.style.height = '850px';
           
     
//             allProducts.forEach(product => {
//                 const productElement = document.createElement('tr');
//                 productElement.className = `product-${product.id}`;
//                 productElement.innerHTML = `
//                     <td class="product-cart-image">
//                         <a href="http://localhost:8000/producto/${product.slug}">
//                             <img src="${product.image}" height="124px" width="124px" alt="${product.name}">
//                         </a>
//                     </td>
//                     <td class="cart-product-name-info">${product.description} <h4> </h4></td>
//                     <td class="cart-product-quantity-td"><div>${product.quantity}</div></td>
//                     <td class="cart-product-price-by-unity-td">$${parseFloat(product.price).toLocaleString('en-En')}</td>
//                     <td class="cart-product-total-price-td">$${(product.price * product.quantity).toLocaleString('en-En')}</td>
//                     <td> <i class="bi bi-trash3-fill delete-item-button" data-product-id="${product.id}"></i></td>
//                 `;
//                 //<td> <button class="delete-item-button" data-product-id="${product.id}">Eliminar</button></td>
//                 cartItemsContainer.appendChild(productElement);
//                 total += product.price * product.quantity;
//             });

//             cartTotalElement.textContent = total.toLocaleString('en-En');
//         }
//     };

//     updateCartDisplay();

//     document.getElementById('checkout-button').addEventListener('click', () => {
//         cart.clear();
//         updateCartDisplay();
//         alert('Gracias por tu compra! owo');
//         location.reload()
//         console.log('Aqui te toca ceja hacer los pagos owo');
//     });

//     document.getElementById('clear-cart-button').addEventListener('click', () => {
//         cart.clear();
//         updateCartDisplay();
//         location.reload()
//         alert('Carrito vaciado owo!');
//     });

//     cartItemsContainer.addEventListener('click', (e) => {
//         const allP = cart.getAllProducts();
//         if (e.target.classList.contains('delete-item-button')) {
//             const productId = e.target.getAttribute('data-product-id');
//             cart.removeProduct(productId);
//             updateCartDisplay();
//             if (allP.length === 5) location.reload()
//             alert('Eliminado del carrito!');
//         }
//     });
// });

import DoublyLinkedList from '././classes/DoublyLinkedList.js';
import Product from '././classes/Product.js';

document.addEventListener('DOMContentLoaded', () => {
    const cart = new DoublyLinkedList();
    cart.loadFromCache();

    const cartItemsContainer = document.getElementById('products-resume');
    const cartTotalElement = document.getElementById('cart-total');
    const cartTotalTemplate = document.getElementById('cart-quantity-template');
    const emptyCartMessage = document.getElementById('empty-cart-message');
    const productsTable = document.getElementById('products-table');
    const clearCartButton = document.getElementById('clear-cart-button');
    const scrollContainer = document.getElementById('contenedor-con-scroll');
    const spaceSection = document.getElementById('space-section');



    const updateCartDisplay = () => {
        cartItemsContainer.innerHTML = '';
        const allProducts = cart.getAllProducts();
        let total = 0;

        if (allProducts.length === 0) {
            emptyCartMessage.style.display = 'block';
            emptyCartMessage.style.position = 'relative';
            emptyCartMessage.style.top = '100px';
            productsTable.style.display = 'none';
            clearCartButton.style.display = 'none';
        } else {
            emptyCartMessage.style.display = 'none';
            productsTable.style.display = 'table';
            productsTable.style.position = 'relative';
            scrollContainer.style.display = 'block';

            productsTable.style.top = '60px';
            clearCartButton.style.display = 'block';
            clearCartButton.style.position = 'relative';
            clearCartButton.style.left = '235px';
            clearCartButton.style.top = '100px';

            if (allProducts.length > 4) scrollContainer.style.overflowY = 'auto';
            if (allProducts.length > 4) spaceSection.style.height = '850px';

            allProducts.forEach(product => {
                const productElement = document.createElement('tr');
                productElement.className = `product-${product.id}`;
                productElement.innerHTML = `
                    <td class="product-cart-image">
                        <a href="http://localhost:8000/producto/${product.slug}">
                            <img src="${product.image}" height="124px" width="124px" alt="${product.name}">
                        </a>
                    </td>
                    <td class="cart-product-name-info">${product.description} <h4> </h4></td>
                    <td class="cart-product-quantity-td"><div>${product.quantity}</div></td>
                    <td class="cart-product-price-by-unity-td">$${parseFloat(product.price).toLocaleString('en-En')}</td>
                    <td class="cart-product-total-price-td">$${(product.price * product.quantity).toLocaleString('en-En')}</td>
                    <td> <i class="bi bi-trash3-fill delete-item-button" data-product-id="${product.id}"></i></td>
                `;
                cartItemsContainer.appendChild(productElement);
                total += product.price * product.quantity;
            });
            
            cartTotalTemplate.textContent = `Carrito (${allProducts.length})`;
            cartTotalElement.textContent = total.toLocaleString('en-En');
        }
    };

    updateCartDisplay();

    document.getElementById('checkout-button').addEventListener('click', () => {
        cart.clear();
        updateCartDisplay();
        toastr.success('Gracias por tu compra! owo');

        console.log('Aqui te toca ceja hacer los pagos owo');
    });

    document.getElementById('clear-cart-button').addEventListener('click', () => {
        cart.clear();
        updateCartDisplay();

        Toastify({
            text: `• Carrito vaciado con éxito.`,
            duration: 4000,
            newWindow: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
              background: "#6f0101",
            },
            onClick: function(){} // Callback after click
          }).showToast();
        setTimeout(()=> location.reload(), 4000)
    });

    cartItemsContainer.addEventListener('click', (e) => {
        const allP = cart.getAllProducts();
        
        if (e.target.classList.contains('delete-item-button')) {
            const productId = e.target.getAttribute('data-product-id');
            cart.removeProduct(productId);
            updateCartDisplay();
            if (allP.length === 5) location.reload();
            Toastify({
                text: `• Producto eliminado del carrito.`,
                duration: 4000,
                newWindow: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                  background: "#d1a722",
                },
                onClick: function(){} // Callback after click
              }).showToast();
        }
    });
});