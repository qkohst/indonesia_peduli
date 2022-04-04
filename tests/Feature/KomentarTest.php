<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KomentarTest extends TestCase
{
    /**
     * @test
     * Assert an user can view page all comment
     *
     * @return void
     */
    public function testShowPageAllKomentar()
    {
        $response = $this->get('komentar/1')
            ->assertStatus(200)
            ->assertViewIs('landing-page.semua-komentar');
    }

    // KURANG POST KOMENTAR
}
