<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\Models\User;
use Livewire\Livewire;
use App\Livewire\CreateUser;
use App\Livewire\UpdateUser;
use App\Livewire\DeleteUser;
use App\Livewire\UserList;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
            ->set('profile_picture', null)
            ->call('submit');
            //->assertStatus(200);

            $this->assertDatabaseHas('users', [
                'email' => 'johnemmanuel3@live.com',
                'firstname' => 'Emmanuel',
            ]);

    }
    //Assert mandatory fields must be supplied
    public function test_create_user_missing_required_fields()
    {
        Livewire::test(CreateUser::class)
            ->set('firstname', '')
            ->set('lastname', '')
            ->set('email', '')
            ->set('password', '')
            ->call('submit')
            ->assertHasErrors(['firstname' => 'required', 'lastname' => 'required', 'email' => 'required', 'password' => 'required']);
    }

    //Assert mismatched password will be checked and flagged
    public function test_create_user_mismatched_passwords()
    {
        Livewire::test(CreateUser::class)
            ->set('password', 'password123')
            ->set('password_confirmation', 'differentpassword')
            ->call('submit')
            ->assertHasErrors(['password' => 'confirmed']);
    }


    //Assert all users can be listed
    public function test_view_all_users()
    {
        $user = User::factory()->create();

        Livewire::test(UserList::class)
            ->assertSee($user->firstname)
            ->assertSee($user->email);
    }

    //Assert user can be deleted
     public function test_allows_user_delete()
     {
         $user = User::factory()->create();

         Livewire::test(UserList::class)
             ->call('deleteUser', $user->id);

         $this->assertDatabaseMissing('users', [
             'id' => $user->id,
         ]);
     }



}
