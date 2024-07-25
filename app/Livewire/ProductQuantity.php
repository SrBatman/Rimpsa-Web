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

    public function mount($productId, $productName, $productPrice, $productImage)
    {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productPrice = $productPrice;
        $this->$productImage = $productImage;   
    }

    public function incrementQuantity()
    {
        $this->quantityCount++;
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
