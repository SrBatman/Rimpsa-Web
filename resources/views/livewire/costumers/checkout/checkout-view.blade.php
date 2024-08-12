<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container-for-checkout" style="width: 60%;">
            <h4>Proceder al pago</h4>
            <hr>

            @if($this->totalProductAmount != '0')
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary" style="color: #342665 !important;">
                            Precio Total :
                            <span class="float-end">${{ number_format($this->totalProductAmount, 2) }}</span>
                        </h4>
                        <hr>
                        <!-- <small>* Tu pedido llegara en 3 a 5 dias.</small>
                        <br />
                        <small>* Los impuestos y otros cargos están incluidos. ?</small> -->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary" style="color: #342665 !important;">
                            Informacion Basica
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Nombre completo</label>
                                <input type="text" wire:model.defer="fullname" id="fullname" class="form-control" placeholder="Enter Full Name" />
                                @error('fullname') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Numero Telefonico</label>
                                <input type="text" wire:model.defer="phone" id="phone" class="form-control" placeholder="Enter Phone Number" />
                                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Direccion de Email</label>
                                <input type="email" wire:model.defer="email" id="email" class="form-control" placeholder="Enter Email Address" />
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Codigo Postal (Zip-code)</label>
                                <input type="number" wire:model.defer="pincode" id="pincode" class="form-control" placeholder="Enter Pin-code" />
                                @error('pincode') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Direccion del domicilio</label>
                                <textarea wire:model.defer="address" id="address" class="form-control" rows="2"></textarea>
                                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3" wire:ignore>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                            <h6>Pago en entrega</h6>
                                            <hr />
                                            <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-primary">
                                                <span wire:loading.remove wire:target="codOrder">
                                                    Realizar Pedido (Pago en entrega)
                                                </span>
                                                <span wire:loading wire:target="codOrder">
                                                    Realizando Pedido
                                                </span>
                                            </button>
                                        </div>
                                        <div class="tab-pane fade active show" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                            <h6>Pago en linea</h6>
                                            <hr />
                                            <div>
                                                <div id="paypal-button-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            @else
            <div class="card-sss card-body-sss shadow text-center p-md-5" style="width:700px!important;">
                <h4>No hay artículos en el carrito para pagar</h4>
                <img src="{{ asset('assets/imgs/shopping-cart-animated.gif') }}" alt="cute-gif" height="200px">
                <a href="{{ route('tienda') }}" class="btn btn-warning" style="height: 40px !important; width:400px; font-size: 20px; display: block; text-align: center;"><strong>Compra Ahora</strong></a>
            </div>
            @endif
        </div>
    </div>
</div>


@push('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AS19SP2cJY2Gi8NBaUpgclgerIwMq4fuyLpHDiMi_fi0ZG7qT8oOae_nyisbSqWKmljrNE652Dub1aJJ&currency=USD"></script>
<script>
    paypal.Buttons({
        onClick() {
            if (!document.getElementById('fullname').value ||
                !document.getElementById('phone').value ||
                !document.getElementById('email').value ||
                !document.getElementById('pincode').value ||
                !document.getElementById('address').value
            ) {
                Livewire.dispatch('validationForAll');
                return false;
            } else {
                @this.set('fullname', document.getElementById('fullname').value);
                @this.set('email', document.getElementById('email').value);
                @this.set('phone', document.getElementById('phone').value);
                @this.set('pincode', document.getElementById('pincode').value);
                @this.set('address', document.getElementById('address').value);
            }
        },

        createOrder: (data, actions) => {
            let totalInPesos = parseFloat('{{ $this->totalProductAmount }}');

            // Convertir de pesos mexicanos a dólares
            let conversionRate = 19; // 1 USD = 19 MXN
            let totalInDollars = (totalInPesos / conversionRate).toFixed(2); // Redondear a dos decimales

            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: totalInDollars,
                        currency_code: 'USD'
                    }
                }]
            });
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];

                if (transaction.status == "COMPLETED") {
                    Livewire.dispatch('transactionEmit', transaction.id);
                }
            });
        }
    }).render('#paypal-button-container');
</script>
@endpush