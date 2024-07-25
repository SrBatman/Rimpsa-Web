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

    public function mount($productId, $productName, $productPrice, $productImage, $productStock)
    {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productPrice = $productPrice;
        $this->productImage = $productImage; 
        $this->productStock = $productStock; 

    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < $this->productStock  ) $this->quantityCount++;
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
            'price' => $this->productPrice,
            'quantity' => $this->quantityCount,
            'image' => $this->productImage,
        ]);
    }
}
