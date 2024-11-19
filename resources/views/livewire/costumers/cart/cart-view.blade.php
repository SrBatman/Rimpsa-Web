<div>
    @if (empty($cart))
        <div style="text-align: center; margin-top: 100px;">
            <h2 style="color: #645959;">No hay nada en el carrito</h2>
            <img src="{{ asset('/assets/imgs/cart-empty.png') }}" alt="" style="max-width: 300px; margin-top: 10px;">
        </div>
    @else
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px; font-family: Arial, sans-serif;">
            <thead>
                <tr style="background-color: #f4f4f4; text-align: left;">
                    <th style="padding: 15px; border-bottom: 1px solid #ddd; font-size: 16px;">Imagen</th>
                    <th style="padding: 15px; border-bottom: 1px solid #ddd; font-size: 16px;">Descripción</th>
                    <th style="padding: 15px; border-bottom: 1px solid #ddd; font-size: 16px;">Cantidad</th>
                    <th style="padding: 15px; border-bottom: 1px solid #ddd; font-size: 16px;">Precio Unitario</th>
                    <th style="padding: 15px; border-bottom: 1px solid #ddd; font-size: 16px;">Precio Total</th>
                    <th style="padding: 15px; border-bottom: 1px solid #ddd; font-size: 16px;">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $product)
                    <tr>
                        <td style="padding: 15px; border-bottom: 1px solid #ddd; text-align: center;">
                            <img src="{{ $product['image'] }}" alt="Imagen" style="max-width: 70px;">
                        </td>
                        <td style="padding: 15px; border-bottom: 1px solid #ddd;">{{ $product['name'] }}</td>
                        <td style="padding: 15px; border-bottom: 1px solid #ddd; text-align: center;">
                            <button wire:click="decreaseQuantity({{ $product['id'] }})" 
                                    style="padding: 8px 15px; border: none; background-color: #f44336; color: white; cursor: pointer;">
                                -
                            </button>
                            <span style="margin: 0 15px; font-size: 16px;">{{ $product['quantity'] }}</span>
                            <button wire:click="increaseQuantity({{ $product['id'] }})" 
                                    style="padding: 8px 15px; border: none; background-color: #4CAF50; color: white; cursor: pointer;">
                                +
                            </button>
                        </td>
                        <td style="padding: 15px; border-bottom: 1px solid #ddd;">{{ $product['price'] }}</td>
                        <td style="padding: 15px; border-bottom: 1px solid #ddd;">
                            {{ $product['price'] * $product['quantity'] }}
                        </td>
                        <td style="padding: 15px; border-bottom: 1px solid #ddd; text-align: center;">
                            <button wire:click="removeFromCart({{ $product['id'] }})" 
                                    style="padding: 8px 15px; border: none; background-color: #f44336; color: white; cursor: pointer;">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
       
        <div style="text-align: center; margin-top: 20px;">
            <button wire:click="clearCart" 
                    style="padding: 10px 20px; border: none; background-color: #ff9800; color: white; cursor: pointer; font-size: 16px;">
                Vaciar todo el carrito
            </button>
        </div>
    @endif
</div>