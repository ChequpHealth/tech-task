<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
class UserView extends Component
{

    public $user;

    // Load the user by ID
    public function mount($userId)
    {
        $this->user = User::findOrFail($userId);
    }


    public function render()
    {
        return view('livewire.user-view');
    }
}
