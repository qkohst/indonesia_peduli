<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    /** @test  */

    public function ShowPageHome()
    {
        $response = $this->get('/')
            ->assertStatus(200)
            ->assertViewIs('landing-page.home');
    }

    /** @test  */

    public function ShowPageAllProgram()
    {
        $response = $this->get('/program')
            ->assertStatus(200)
            ->assertViewIs('landing-page.semua-program');
    }

    /** @test  */

    public function ShowPageDetailProgram()
    {
        $response = $this->get('/program/21')
            ->assertStatus(200)
            ->assertViewIs('landing-page.show');
    }

    /** @test  */

    public function ShowPageProgramByKategori()
    {
        $response = $this->get('/program/kategori/1')
            ->assertStatus(200)
            ->assertViewIs('landing-page.by-kategori');
    }

    /** @test  */

    public function ShowPageTransparansi()
    {
        $response = $this->get('/transparansi')
            ->assertStatus(200)
            ->assertViewIs('landing-page.transparansi');
    }

    /** @test  */
    
    public function ShowPageFaq()
    {
        $response = $this->get('/faq')
            ->assertStatus(200)
            ->assertViewIs('landing-page.faq');
    }
}
