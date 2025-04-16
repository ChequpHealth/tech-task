<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserList extends Component
{
    public $users;

    public function mount()
    {
        $this->users = User::all(); // Fetch all users
    }

    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        // Refresh the user list after deletion
        $this->users = User::all();
        session()->flash('message', 'User deleted successfully.');
    }



    public function render()
    {
        return view('livewire.user-list');
    }
}
