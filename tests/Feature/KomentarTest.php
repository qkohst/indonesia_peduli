<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KomentarTest extends TestCase
{
    /** @test  */

    public function AnyoneCanShowPageAllKomentar()
    {
        $response = $this->get('komentar/21')
            ->assertStatus(200)
            ->assertViewIs('landing-page.semua-komentar');
    }

    // KURANG POST KOMENTAR
}
