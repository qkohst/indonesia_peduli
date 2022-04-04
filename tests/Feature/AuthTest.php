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
    /**
     * @test
     * Assert an user can view page login
     *
     * @return void
     */
    public function testShowPageLogin()
    {
        $response = $this->get('auth/login')
            ->assertStatus(200)
            ->assertViewIs('auth.login');
    }

    /**
     * @test
     * Assert an user can login & redirect to dashboard
     *
     * @return void
     */
    // public function testPostLogin()
    // {

    //     $user = User::factory()->create();

    //     $response = $this->post('auth/login', [
    //         'email' => $user->email,
    //         'password' => 'password'
    //     ]);
    //     $this->assertAuthenticated();

    //     $response->assertRedirect('dashboard');
    // }

    /**
     * @test
     * Assert an user can view page register
     *
     * @return void
     */
    public function testShowPageRegister()
    {
        $response = $this->get('auth/register')
            ->assertStatus(200)
            ->assertViewIs('auth.register');
    }
}
