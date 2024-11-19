document.addEventListener('livewire:init', async function () {
    Livewire.on('productAdded', (product) => {
    

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
       
    });
    
});
