<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    /** @test  */

    public function AnyoneCanShowPageHome()
    {
        $response = $this->get('/')
            ->assertStatus(200)
            ->assertViewIs('landing-page.home');
    }

    /** @test  */

    public function AnyoneCanShowPageAllProgram()
    {
        $response = $this->get('/program')
            ->assertStatus(200)
            ->assertViewIs('landing-page.semua-program');
    }

    /** @test  */

    public function AnyoneCanShowPageDetailProgram()
    {
        $response = $this->get('/program/21')
            ->assertStatus(200)
            ->assertViewIs('landing-page.show');
    }

    /** @test  */

    public function AnyoneCanShowPageProgramByKategori()
    {
        $response = $this->get('/program/kategori/1')
            ->assertStatus(200)
            ->assertViewIs('landing-page.by-kategori');
    }

    /** @test  */

    public function AnyoneCanShowPageTransparansi()
    {
        $response = $this->get('/transparansi')
            ->assertStatus(200)
            ->assertViewIs('landing-page.transparansi');
    }

    /** @test  */

    public function AnyoneCanShowPageFaq()
    {
        $response = $this->get('/faq')
            ->assertStatus(200)
            ->assertViewIs('landing-page.faq');
    }
}
