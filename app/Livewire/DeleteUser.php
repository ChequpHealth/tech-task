<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class DeleteUser extends Component
{
    public $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function delete()
    {
        $user = User::findOrFail($this->userId);
        $user->delete();

        session()->flash('success', 'User deleted successfully.');
        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.delete-user');
    }
}
