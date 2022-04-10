<?php

namespace Tests\Feature;

use App\Komentar;
use App\ProgramDonasi;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KomentarTest extends TestCase
{
    /** @test  */

    public function RedirectIfUserPostedCommentNotAuthenticated()
    {
        $program_donasi = ProgramDonasi::first();
        $response = $this->post('member/komentar', [
            'program_donasi_id' => $program_donasi->id,
            'komentar' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque mollitia illo quos consectetur, vitae doloremque reiciendis aliquid voluptates minus consequuntur, quae harum repellendus porro deleniti corporis. Tenetur assumenda error suscipit?'

        ])
            ->assertRedirect(route('login'));
    }
    
    /** @test */

    public function UserPostedCommentSucceeded()
    {
        $program_donasi = ProgramDonasi::first();
        $user = User::where('role', 2)->first();
        $this->actingAs($user);

        $response = $this->post('member/komentar', [
            'program_donasi_id' => $program_donasi->id,
            'komentar' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque mollitia illo quos consectetur, vitae doloremque reiciendis aliquid voluptates minus consequuntur, quae harum repellendus porro deleniti corporis. Tenetur assumenda error suscipit?'

        ])
            ->assertStatus(302)
            ->assertSessionHas('toast_success');
    }
    /** @test */

    public function UserPostedCommentFailed()
    {
        $program_donasi = ProgramDonasi::first();
        $user = User::where('role', 2)->first();
        $this->actingAs($user);

        $response = $this->post('member/komentar', [
            'program_donasi_id' => $program_donasi->id,
        ])
            ->assertStatus(302)
            ->assertSessionHas('toast_error');
    }

    /** @test  */

    public function AnyoneCanShowPageAllCommentProgram()
    {
        $komentar = Komentar::first();
        $response = $this->get('komentar/' . $komentar->program_donasi_id)
            ->assertStatus(200)
            ->assertViewIs('landing-page.semua-komentar');
    }
}
