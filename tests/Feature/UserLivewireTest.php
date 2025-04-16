<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\Models\User;
use Livewire\Livewire;
use App\Livewire\CreateUser;
use Illuminate\Foundation\Testing\RefreshDatabase;


class UserLivewireTest extends TestCase
{
    /**
     * Test user create
     */
    use RefreshDatabase; // Make sure database exist first and is migrated
    public function test_create_user()
    {
        Livewire::test(CreateUser::class)
            ->set('firstname', 'Emmanuel')
            ->set('lastname', 'John')
            ->set('email', 'johnemmanuel3@live.com')
            ->set('phone_number', '07466382332')
            ->set('password', 'password123')
            ->set('password_confirmation', 'password123')
            ->set('country', 'England')
            ->set('gender', 'Male')
            ->set('profile_picture', 'emmanuel.jpg')
            ->call('submit')
            ->assertStatus(200);
    }
    public function test_create_user_missing_required_fields()
    {
        Livewire::test(CreateUser::class)
            ->set('firstname', '')
            ->set('email', '')
            ->call('submit')
            ->assertHasErrors(['firstname' => 'required', 'email' => 'required']);
    }

    public function test_create_user_mismatched_passwords()
    {
        Livewire::test(CreateUser::class)
            ->set('password', 'password123')
            ->set('password_confirmation', 'differentpassword')
            ->call('submit')
            ->assertHasErrors(['password' => 'confirmed']);
    }
}
