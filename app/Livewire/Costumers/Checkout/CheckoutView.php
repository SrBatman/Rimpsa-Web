<?php

namespace App\Livewire\Costumers\Checkout;

use App\Models\Carts;
use App\Models\Orders;
use Livewire\Component;
use App\Models\Orderitems;
use Illuminate\Support\Str;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Mail;

class CheckoutView extends Component
{
    public $carts, $totalProductAmount = 0;

    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

    protected $listeners = [
        'validationForAll',
        'transactionEmit' => 'paidOnlineOrder'
    ];
    public $cart = [];
    public $subtotal = 0;
    public $shipping = 2; // Este es un costo fijo de ejemplo, cámbialo según la lógica de tu aplicación.
    public $total = 0;

    // Método para cargar el carrito desde la sesión
    public function mount()
    {
        $this->cart = session()->get('cart', []);
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->subtotal = 0;
        foreach ($this->cart as $product) {
            $this->subtotal += $product['price'] * $product['quantity'];
        }

        // Calculamos el total
        $this->total = $this->subtotal + $this->shipping;
    }

    public function rules(){
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'pincode' => 'required|string|max:6|min:4',
            'address' => 'required|string|max:500',
        ];
    }

    public function paidOnlineOrder($value){
        $this->payment_id = $value;
        $this->payment_mode = 'Pagado con Paypal';
        

        $onlineOrder = $this->placeOrder();
        if ($onlineOrder){
            // Carts::where('user_id', auth()->user()->id)->delete();
            //Limpiamos el carrito
            session()->forget('cart');
            
            try{
                $order = Orders::findOrFail($onlineOrder->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
                //Mail Sent Successfully
            }catch(\Exception $e){
                //Something Went Wrong

                dd($e->getMessage());
            }

            session()->flash('message', 'Pedido realizado con éxito');
            $this->dispatch('message', [
                'text' => 'Pago realizado con éxito',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        } else {
            $this->dispatch('message', [
                'text' => 'Algo salió mal',
                'type' => 'error',
                'status' => 500
            ]);
        }

    }

    public function validationForAll(){
        $this->validate();
    }


    public function placeOrder(){
        $this->validate();
        $order = Orders::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'cluckoo-'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'In Progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
        ]);

        foreach ($this->carts as $cartItem) {
            $orderItems = Orderitems::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' =>$cartItem->product->selling_price,
            ]);

            if($cartItem->product_color_id != NULL){
                $cartItem->productColor()->where('id',$cartItem->product_color_id)->decrement('quantity',$cartItem->quantity);
            } else {
                $cartItem->product()->where('id',$cartItem->product_id)->decrement('quantity',$cartItem->quantity);
            }
        }

        return $order;
    }

    public function codOrder(){
        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();
        if ($codOrder){

            try{
                $order = Orders::findOrFail($codOrder->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
                //Mail Sent Successfully
            }catch(\Exception $e){
                //Something Went Wrong
                dd($e->getMessage());
            }

            session()->flash('message', 'Order Placed Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function totalProductAmount(){
        $this->totalProductAmount = 0;
        $this->carts = Carts::where('user_id', auth()->user()->id)->get();
        
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += $cartItem->product->price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        if (auth()->user()->userDetail) {
            $this->phone = auth()->user()->userDetail->phone;
            $this->pincode = auth()->user()->userDetail->pin_code;
            $this->address = auth()->user()->userDetail->address;
        }

        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.costumers.checkout.checkout-view');
    }
}
