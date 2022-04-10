<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    /**
     * @test
     * Assert an user can view page home  
     *
     * @return void
     */
    public function ShowPageHome()
    {
        $response = $this->get('/')
            ->assertStatus(200)
            ->assertViewIs('landing-page.home');
    }

    /**
     * @test
     * Assert an user can view page all program 
     *
     * @return void
     */
    public function ShowPageAllProgram()
    {
        $response = $this->get('/program')
            ->assertStatus(200)
            ->assertViewIs('landing-page.semua-program');
    }

    /**
     * @test
     * Assert an user can view page detail program 
     *
     * @return void
     */
    public function ShowPageDetailProgram()
    {
        $response = $this->get('/program/21')
            ->assertStatus(200)
            ->assertViewIs('landing-page.show');
    }

    /**
     * @test
     * Assert an user can view page detail program 
     *
     * @return void
     */
    public function testShowPageProgramByKategori()
    {
        $response = $this->get('/program/kategori/1')
            ->assertStatus(200)
            ->assertViewIs('landing-page.by-kategori');
    }

    /**
     * @test
     * Assert an user can view page transparansi 
     *
     * @return void
     */
    public function testShowPageTransparansi()
    {
        $response = $this->get('/transparansi')
            ->assertStatus(200)
            ->assertViewIs('landing-page.transparansi');
    }

    /**
     * @test
     * Assert an user can view page faq 
     *
     * @return void
     */
    public function testShowPageFaq()
    {
        $response = $this->get('/faq')
            ->assertStatus(200)
            ->assertViewIs('landing-page.faq');
    }
}
