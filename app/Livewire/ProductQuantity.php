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
        $this->dispatch('productAdded', [
            'id' => $this->productId,
            'name' => $this->productName,
            'description' => $this->productDescription,
            'slug' => $this->productSlug,
            'price' => $this->productPrice,
            'quantity' => $this->quantityCount,
            'image' => $this->productImage,
        ]);
        //  flash()->flash('success', 'El producto se ha agregado con éxito.');
        // toastr()-> success('El producto se ha agregado con éxito.');
    }
}
