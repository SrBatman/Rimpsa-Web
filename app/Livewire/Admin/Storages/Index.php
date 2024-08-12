<?php

namespace App\Livewire\Admin\Storages;

use Livewire\Component;
use App\Models\Storages;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $storageLogs = Storages::orderBy('id', 'ASC')->paginate(10);;
        return view('livewire.admin.storages.index', compact('storageLogs'));
    }
}
