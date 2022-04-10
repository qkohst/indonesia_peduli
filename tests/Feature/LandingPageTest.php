<?php

namespace Tests\Feature;

use App\KategoriDonasi;
use App\ProgramDonasi;
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
        $program = ProgramDonasi::first();

        $response = $this->get('program/' . $program->id)
            ->assertStatus(200)
            ->assertViewIs('landing-page.show');
        $this->withoutExceptionHandling();
    }

    /** @test  */

    public function AnyoneCanShowPageProgramByKategori()
    {
        $kategori = KategoriDonasi::first();
        $response = $this->get('/program/kategori/' . $kategori->id)
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
