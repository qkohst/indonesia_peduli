<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /** @test  */

    public function AnyoneCanShowPageLogin()
    {
        $response = $this->get('auth/login')
            ->assertStatus(200)
            ->assertViewIs('auth.login');
    }

    /** @test  */

    public function UserCanBeAuthenticatedUsingHisCredentials()
    {
        $user = User::where('role', 2)->first();

        $response = $this->post('auth/login', [
            'email' => $user->email,
            'password' => '123456'
        ])
            ->assertStatus(302)
            ->assertRedirect(route('dashboard'));

        $this->assertAuthenticated();
    }

    /** @test  */

    public function AdminCanBeAuthenticatedUsingHisCredentials()
    {
        $user = User::where('role', 1)->first();

        $response = $this->post('auth/login', [
            'email' => $user->email,
            'password' => '123456'
        ])
            ->assertStatus(302)
            ->assertRedirect(route('dashboard'));
        $this->assertAuthenticated();
    }

    /** @test  */

    public function UserMayNotLoggedinWithWrongCredentials()
    {
        $user = User::where('role', 2)->first();
        $response = $this->post('auth/login', [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertStatus(302)
            ->assertSessionHas('toast_error');
        $this->assertGuest();
    }

    /** @test  */

    public function UserMayNotLoggedinWithoutCredentials()
    {
        $response = $this->post('auth/login', [])
            ->assertStatus(302)
            ->assertSessionHas('toast_error');
        $this->assertGuest();
    }

    /** @test  */

    public function AnyoneCanShowPageRegister()
    {
        $response = $this->get('auth/register')
            ->assertStatus(200)
            ->assertViewIs('auth.register');
    }

    /** @test */

    public function AnyoneCanRegistered()
    {
        $count_user = User::count();

        $response = $this->post('auth/register', [
            'nama_lengkap' => 'User ' . ($count_user + 1),
            'jenis_kelamin' => 'L',
            'email' => 'memberpeduli' . ($count_user + 1) . '@gmail.com',
            'nomor_hp' => '0853265325' . ($count_user + 1),
            'password' => '123456',
            'konfirmasi_password' => '123456',
        ])
            ->assertRedirect(route('login'));
    }

    /** @test */

    public function UserRegistrastionFailed()
    {
        $response = $this->post('auth/register', [
            'nama_lengkap' => 'User',
            'jenis_kelamin' => 'L',
            'email' => 'user@gmail.com',
            'nomor_hp' => '085123655654',
            'password' => '123456',
            'konfirmasi_password' => '0123456',
        ])
            ->assertStatus(302)
            ->assertSessionHas('toast_error');
    }

    /** @test */

    public function UserLoggedinCanBeLogout()
    {
        $user = User::where('role', 2)->first();
        $this->actingAs($user);

        $this->get('auth/logout')
            ->assertSessionHas('toast_success')
            ->assertStatus(302)
            ->assertRedirect(route('home'));
    }
}
