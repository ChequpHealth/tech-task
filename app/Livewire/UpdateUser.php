<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UpdateUser extends Component
{
    public User $user;

    public $firstname;
    public $lastname;
    public $email;
    public $phone_number;
    public $gender;
    public $country;
    public function mount(User $user)
    {
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->gender = $user->gender;
        $this->country = $user->country;
    }

    public function updated($property)
    {
        $this->validateOnly($property, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ]);
    }

    public function update()
    {
        $validated = $this->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $this->user->id,
        'phone_number' => 'nullable|string|max:40|min:7',
        'gender' => 'nullable|in:Male,Female',
        'country' => 'nullable|string|max:255',
        ]);

        $this->user->update($validated);

        session()->flash('message', 'User updated successfully!');
        return redirect()->route('user.view', $this->user->id);
    }

    public function render()
    {
        return view('livewire.update-user');
    }
}
