<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /** @test  */

    public function UserCanShowDashboardPage()
    {
        $user = User::where('role', 2)->first();
        $this->actingAs($user);

        $this->withoutExceptionHandling();
        $response = $this->get('dashboard')
            ->assertStatus(302);
    }

    /** @test  */

    public function AdminCanShowDashboardPage()
    {
        $user = User::where('role', 1)->first();
        $this->actingAs($user);

        $response = $this->get('dashboard')
            ->assertStatus(200)
            ->assertViewIs('admin.dashboard.index');
    }

    /** @test  */

    public function RedirectIfUserNotAuthenticated()
    {
        $this->get('dashboard')->assertRedirect(route('login'));
    }
}
