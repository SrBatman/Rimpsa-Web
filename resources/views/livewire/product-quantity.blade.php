<div>
    <div class="top-producto">
        <div class="input-group">
            <span class="btn btn1" wire:click="decrementQuantity"><i class="bi bi-dash-lg"></i></span>
            <input class ="producto-input-quantity" type="text" wire:model="quantityCount" readonly class="input-quantity" />
            <span class="btn btn1" wire:click="incrementQuantity"><i class="bi bi-plus-lg"></i></span>
        </div>
    </div>
    <div class="bottom-producto">
        <button type="button" wire:click="addToCart" class="btn btn1"  @disabled($this->productStock === 0)>
            <i class="bi bi-cart"></i> Añadir al carrito
        </button>
    </div>
</div>
