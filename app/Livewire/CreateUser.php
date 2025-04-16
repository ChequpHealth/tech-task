<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Component
{
    use WithFileUploads;
    public $firstname;
    public $lastname;
    public $email;
    public $phone_number;
    public $gender;
    public $country;
    public $profile_picture;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone_number' => 'required|string|max:40|min:7',
        'gender' => 'required|string|max:6|min:4',
        'password' => 'required|string|min:8|confirmed',
        'country' => 'required|string|max:255',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    ];

    public function submit()
    {
        // Validate all fields, including the profile picture
        $this->validate();

        // Handle the profile picture upload if it exists
        $profilePicturePath = null;
        if ($this->profile_picture) {
            $profilePicturePath = $this->profile_picture->store('profile_picture', 'public'); // Store the image in public disk
        }
        // Create the user with the uploaded profile picture path
        User::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'gender' => $this->gender,
            'password' => Hash::make($this->password),
            'country' => $this->country,
            'profile_picture' => $profilePicturePath, // Store the path of the image
        ]);

        session()->flash('message', 'User created successfully');
        $this->reset(); // Reset the form fields after submission

        sleep(1);
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
