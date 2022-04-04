<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TentangKamiTest extends TestCase
{
    /**
     * @test
     * Assert an user can view tentang kami page
     *
     * @return void
     */
    public function testShowPageTentangKami()
    {
        $response = $this->get('tentang-kami')
            ->assertStatus(200)
            ->assertViewIs('tentang-kami.index');
    }
}
