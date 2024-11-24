document.addEventListener('livewire:init', async function () {
    Livewire.on('productAdded', (cantidad) => {
        const cartQuantity = document.getElementById('cart-quantity-template');
        cartQuantity.textContent = `Carrito (${cantidad})`;

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
            onClick: function() {} // Callback after click just in case we need it
        }).showToast();
       
    });
    

    Livewire.on('productRemove', (cantidad) => {
        const cartQuantity = document.getElementById('cart-quantity-template');
        cartQuantity.textContent = `Carrito (${cantidad})`;

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
       
    });
});




Livewire.on('clearCart', (cantidad) => {
    const cartQuantity = document.getElementById('cart-quantity-template');
    cartQuantity.textContent = `Carrito (${cantidad})`;

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
   
});


Livewire.on('productRemoveByEntity', (cantidad) => {
    const cartQuantity = document.getElementById('cart-quantity-template');
    cartQuantity.textContent = `Carrito (${cantidad})`;
   
});