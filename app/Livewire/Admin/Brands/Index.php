<?php

namespace App\Livewire\Admin\Brands;

use Livewire\Component;
use App\Models\Brands;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    
    public function render()
    {
        $brands = Brands::orderBy('id', 'ASC')->paginate(10);
        return view('livewire.admin.brands.index', compact('brands'));
    }
}
