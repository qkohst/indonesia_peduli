<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    // use RefreshDatabase;
    /** @test  */

    public function AnyoneCanShowPageLogin()
    {
        $response = $this->get('auth/login')
            ->assertStatus(200)
            ->assertViewIs('auth.login');
    }


    /** @test  */

    public function AnyoneCanShowPageRegister()
    {
        $response = $this->get('auth/register')
            ->assertStatus(200)
            ->assertViewIs('auth.register');
    }

    /** @test */

    public function UserCanRegistered()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('auth/register', [
            'nama_lengkap' => 'Kukoh Santoso',
            'jenis_kelamin' => 'L',
            'email' => 'kukohsantoso013@gmail.com',
            'nomor_hp' => '085326532545',
            'password' => '123456',
            'konfirmasi_password' => '123456',
        ])
        ->assertRedirect(RouteServiceProvider::LOGIN);
    }
}
