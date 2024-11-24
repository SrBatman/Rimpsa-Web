<?php

namespace App\Livewire;

use Livewire\Component;



class ProductQuantity extends Component
{
    public $quantityCount = 1;
    public $productId;
    public $productName;
    public $productPrice;
    public $productImage;
    public $productStock;
    public $productDescription;
    public $productSlug;

    public function mount($productId, $productName, $productPrice, $productImage, $productStock, $productDescription, $productSlug)
    {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productPrice = $productPrice;
        $this->productImage = $productImage; 
        $this->productStock = $productStock; 
        $this->productDescription = $productDescription;
        $this->productSlug = $productSlug;

    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < $this->productStock) $this->quantityCount++;
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function addToCart()
    {

        $cart = session()->get('cart', []);

        // Verificar si el producto ya existe en el carrito
        if (isset($cart[$this->productId])) {
            // Incrementar la cantidad del producto si ya existe en el carrito
            $cart[$this->productId]['quantity'] += $this->quantityCount;
        } else {
            // Agregar un nuevo producto al carrito
            $cart[$this->productId] = [
                'id' => $this->productId,
                'name' => $this->productName,
                'description' => $this->productDescription,
                'slug' => $this->productSlug,
                'price' => $this->productPrice,
                'quantity' => $this->quantityCount,
                'image' => $this->productImage,
            ];
        }
    
        // Guardar el carrito actualizado en la sesión
        session()->put('cart', $cart);
    
        // Emitir evento o mensaje para indicar que el producto fue agregado con éxito
        $this->dispatch('productAdded', count($cart));
        // flash()->flash('success', 'El producto se ha agregado con éxito.');
        // toastr()-> success('El producto se ha agregado con éxito.');
    }
}
