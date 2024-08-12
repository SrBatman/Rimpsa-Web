<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $userId;


    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.admin.users.index', compact('users'));
    }
}
