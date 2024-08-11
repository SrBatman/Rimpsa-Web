<?php

namespace App\Livewire\Admin\Categories;
use App\Models\Categories;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $categories = Categories::orderBy('id', 'ASC')->paginate(10);
        return view('livewire.admin.categories.index', compact('categories'));
    }
}
