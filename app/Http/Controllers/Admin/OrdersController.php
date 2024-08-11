<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Orders;

class OrdersController extends Controller
{
    //
    public function index(Request $request){

      
        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Orders::when($request->date != null, function ($q) use ($request){
                            return $q->whereDate('created_at',$request->date);
                        }, function ($q) use ($todayDate) {
                            return $q->whereDate('created_at', $todayDate);
                        })

                        ->when($request->status != null, function ($q) use ($request){
                            return $q->where('status_message',$request->status);
                        })
                        ->paginate(10);

        return view('admin.orders.index', compact('orders'));

    }

    public function show(int $orderId){
        $order = Order::where('id',$orderId)->first();
        if($order){
            return view('admin.orders.view', compact('order'));
        } else {
            return redirect('admin/orders')->with('message','Order Id not Found');
        }
    }

    public function updateOrderStatus(int $orderId, Request $request){
        $order = Order::where('id',$orderId)->first();
        if($order){
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/'.$orderId)->with('message','Order Status Updated');
        } else {
            return redirect('admin/orders/'.$orderId)->with('message','Order Id not Found');
        }
    }

    public function viewInvoice(int $orderId){
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice', compact('order'));
    }

    public function generateInvoice(int $orderId){
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];

        $todayDate = Carbon::now()->format('d-m-Y');
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        return $pdf->download('invoice-'.$order->id.'-'.$todayDate.'.pdf');
    }

    public function sendInvoiceEmail(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $totalPrice = $this->calculateTotalPrice($order); // Suponiendo que tengas una función para calcular el precio total

        try {
            Mail::to('jr0211619@gmail.com')->send(new InvoiceOrderMailable($order, $totalPrice)); // Pasa $totalPrice a la mailable
            return redirect()->back()->with('success', 'Correo electrónico de factura enviado correctamente a jr0211619@gmail.com');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Ocurrió un error al enviar el correo electrónico de la factura');

        }
    }

    private function calculateTotalPrice($order)
{
    $totalPrice = 0;

    if ($order->orderItems) { // Cambiado de $order->items a $order->orderItems
        foreach ($order->orderItems as $item) {
            $totalPrice += $item->quantity * $item->price;
        }
    }

    return $totalPrice;
}

}
