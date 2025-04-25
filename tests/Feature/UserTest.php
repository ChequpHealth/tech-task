<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_index_displays_users()
    {
        $users = User::factory()->count(3)->create();

        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
        foreach ($users as $user) {
            $response->assertSee($user->name);
        }
    }

    public function test_user_show_displays_user_details()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.show', $user));

        $response->assertStatus(200)
            ->assertSee($user->name)
            ->assertSee($user->surname)
            ->assertSee($user->email);
    }

    public function test_user_create_form_validation_fails()
    {
        $response = $this->post(route('users.store'), []);
        $response->assertSessionHasErrors(['name', 'surname', 'email', 'country', 'gender', 'password']);
    }

    public function test_user_can_be_created()
    {
        $data = User::factory()->make()->toArray();
        $data['password'] = 'ABCde12345';
        $data['password_confirmation'] = 'ABCde12345';

        $response = $this->post(route('users.store'), $data);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['email' => $data['email']]);
    }

    public function test_user_edit_form_displays()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.edit', $user));

        $response->assertStatus(200)
            ->assertSee('- Edit')
            ->assertSee($user->name);
    }

    public function test_user_can_be_updated()
    {
        $user = User::factory()->create([
            'name' => 'Original',
            'password' => Hash::make('oldpassword'),
        ]);

        $response = $this->put(route('users.update', $user), [
            'name' => 'Updated',
            'surname' => $user->surname,
            'email' => $user->email,
            'phone' => $user->phone,
            'country' => $user->country,
            'gender' => $user->gender,
            'password' => '',
            'password_confirmation' => '',
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'Updated']);
    }

    public function test_user_can_update_password()
    {
        $user = User::factory()->create([
            'password' => Hash::make('oldpassword'),
        ]);

        $response = $this->put(route('users.update', $user), [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
            'phone' => $user->phone,
            'country' => $user->country,
            'gender' => $user->gender,
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
    }

    public function test_user_update_requires_validation()
    {
        $user = User::factory()->create();

        $response = $this->put(route('users.update', $user), [
            'name' => '',
            'surname' => '',
            'email' => 'notAnEmail',
            'country' => 'Unknown',
            'gender' => '',
            'password' => 'short',
            'password_confirmation' => 'different',
        ]);

        $response->assertSessionHasErrors(['name', 'surname', 'email', 'country', 'gender', 'password']);
    }

    public function test_profile_image_upload()
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $file = UploadedFile::fake()->image('profile.jpg');

        $response = $this->put(route('users.update', $user), [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
            'phone' => $user->phone,
            'country' => $user->country,
            'gender' => $user->gender,
            'password' => '',
            'password_confirmation' => '',
            'profile_image' => $file,
        ]);

        $response->assertRedirect(route('users.index'));

        $user->refresh();
        Storage::disk('public')->assertExists($user->profile_image);
    }

    public function test_old_image_is_deleted_when_replaced()
    {
        Storage::fake('public');

        $oldImage = UploadedFile::fake()->image('old.jpg')->store('profile_images', 'public');
        $user = User::factory()->create(['profile_image' => $oldImage]);

        $newImage = UploadedFile::fake()->image('new.jpg');

        $response = $this->put(route('users.update', $user), [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
            'phone' => $user->phone,
            'country' => $user->country,
            'gender' => $user->gender,
            'password' => '',
            'password_confirmation' => '',
            'profile_image' => $newImage,
        ]);

        $user->refresh();

        Storage::disk('public')->assertMissing($oldImage);
        Storage::disk('public')->assertExists($user->profile_image);
    }

    public function test_user_can_be_deleted()
    {
        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', $user));

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_user_profile_image_is_deleted_on_user_delete()
    {
        Storage::fake('public');

        $profileImage = UploadedFile::fake()->image('profile.jpg')->store('profile_images', 'public');
        $user = User::factory()->create(['profile_image' => $profileImage]);

        $response = $this->delete(route('users.destroy', $user));

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
        Storage::disk('public')->assertMissing($profileImage);
    }
}
