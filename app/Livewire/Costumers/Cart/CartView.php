<?php

namespace App\Livewire\Costumers\Cart;

use Livewire\Component;

class CartView extends Component
{

    public $cart = [];
    public $subtotal = 0;
    public $shipping = 10; // Este es un costo fijo de ejemplo, cámbialo según la lógica de tu aplicación.
    public $total = 0;

    // Método para cargar el carrito desde la sesión
    public function mount()
    {
        $this->cart = session()->get('cart', []);
        $this->calculateTotal();
    }

    // Método para calcular el subtotal, costo de envío y total
    public function calculateTotal()
    {
        $this->subtotal = 0;
        foreach ($this->cart as $product) {
            $this->subtotal += $product['price'] * $product['quantity'];
        }

        // Calculamos el total
        $this->total = $this->subtotal + $this->shipping;
    }


    public function increaseQuantity($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        }
        session()->put('cart', $cart);

        // Actualizar la propiedad
        $this->cart = $cart;
    }

    public function decreaseQuantity($productId)
    {
        $cart = session()->get('cart', []);
     
        if (isset($cart[$productId])) {

            //pequeña validacion en caso del que el producto sea 1 xd
            if ($cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity']--;
            } else {
                // Eliminar el producto si la cantidad es 1 y se intenta reducir más
                unset($cart[$productId]);
            }
        }
    
        session()->put('cart', $cart);
    
        // Actualizar la propiedad
        $this->cart = $cart;
    }
    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);
        unset($cart[$productId]);
        session()->put('cart', $cart);

        // Actualizar la propiedad
        $this->cart = $cart;
    }

    public function render()
    {
        return view('livewire.costumers.cart.cart-view');
    }

    public function clearCart()
    {
    session()->forget('cart');  // Vacía el carrito de la sesión
    $this->cart = [];  // Limpiar la propiedad del carrito
    }
}
