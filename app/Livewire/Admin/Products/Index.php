<?php

namespace App\Livewire\Admin\Products;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $product_id;


    public function render()
    {
        $products = Products::orderBy('id', 'ASC')->paginate(10);
    
        return view('livewire.admin.products.index', compact('products'));
    }
}
