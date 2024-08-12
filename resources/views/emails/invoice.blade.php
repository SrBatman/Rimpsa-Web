<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rimpsa - Factura</title>
    <link rel="stylesheet" href="{{ asset('assets/css/invoice.css') }}">
</head>
<body>
    <div class="invoice-container">
        <h1>Detalles pedido</h1>
        
        <p><strong>Fecha de la orden:</strong> {{ $order->created_at }}</p>
        <p><strong>Rastrear mi envio:</strong> {{ $order->tracking_no }}</p>
        <p><strong>Método de pago:</strong> {{ $order->payment_mode}}</p>
        <p><strong>Mensaje del estatus:</strong> {{ $order->status_message }}</p>
        <p><strong>Nombre Completo:</strong> {{ $order->fullname }}</p>
        <p><strong>Teléfono:</strong> {{ $order->phone }}</p>
        <p><strong>Dirección:</strong> {{ $order->address }}</p>
        
        
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->price }}</td>
                        <td>${{ $item->quantity * $item->price }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total">Total:</td>
                    <td class="total">${{ $totalPrice }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>