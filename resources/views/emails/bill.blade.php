
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Factura #{{ $order->id }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/invoice.css') }}">

</head>
<body>
    <div class="text-center">
        <h2>Gracias por tu orden</h2>
        <p>Gracias por comprar con Rimpsa
        <br/>
        Los detalles de tu orden se encuentran abajo
    </p>
    </div>
    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Rimpsa - Refacciones para maquinaria pesada</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Factura Id: #{{ $order->id }}</span> <br>
                    <span>Fecha: {{ date('d / m / Y') }}</span> <br>
                    <span>Codigo Postal: 4431</span> <br>
                    <span>Direccion: #1176 Federico Medrano, Rio Nilo</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Detalles de la orden</th>
                <th width="50%" colspan="2">Detalles de usuario</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Orden Id:</td>
                <td>{{ $order->id }}</td>

                <td>Nombre completo:</td>
                <td>{{ $order->fullname }}</td>
            </tr>
            <tr>
                <td>ID de Seguimiento /No.:</td>
                <td>{{ $order->tracking_no }}</td>

                <td>Correo:</td>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <td>Fecha de orden:</td>
                <td>{{ $order->created_at->format('d-m-Y h:i A') }}</td>

                <td>Telefono:</td>
                <td>{{ $order->phone }}</td>
            </tr>
            <tr>
                <td>Metodo de pago:</td>
                <td>{{ $order->payment_mode }}</td>

                <td>Direccion:</td>
                <td>{{ $order->address }}</td>
            </tr>
            <tr>
                <td>Estatus Orden:</td>
                <td>{{ $order->status_message }}</td>

                <td>Codigo:</td>
                <td>{{ $order->pincode }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Productos comprados
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
                @php
                    $totalPrice = 0;
                @endphp
                @foreach ($order->orderItems as $orderItem)
                    <tr>
                        <td width="10%">{{ $orderItem->id }}</td>
                        <td>
                            {{ $orderItem->product->name }}
                            @if ($orderItem->productColor)
                                @if ($orderItem->productColor->color)
                                    <span>- Color: {{ $orderItem->productColor->color->name }}</span>
                                @endif
                            @endif
                        </td>
                        <td width="10%">{{ $orderItem->price }}</td>
                        <td width="10%">{{ $orderItem->quantity }}</td>
                        <td width="15%" class="fw-bold">
                            ${{ number_format(($orderItem->quantity * $orderItem->price), 2) }}</td>
                        @php
                            $totalPrice += $orderItem->quantity * $orderItem->price;
                        @endphp
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="total-heading">Monto total - <small>Inc. all vat/tax</small> :</td>
                    <td colspan="1" class="total-heading">${{ number_format($totalPrice, 2 )}}</td>
                </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Gracias por comprar en Rimpsa - Refacciones para maquinaria pesada
    </p>

</body>
</html>
