<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    /**
     * @test
     * Assert an user can view home page 
     *
     * @return void
     */
    public function testShowPageHome()
    {
        $response = $this->get('/')
            ->assertStatus(200)
            ->assertViewIs('landing-page.home');
    }

    /**
     * @test
     * Assert an user can view all program page
     *
     * @return void
     */
    public function testShowPageAllProgram()
    {
        $response = $this->get('/program')
            ->assertStatus(200)
            ->assertViewIs('landing-page.semua-program');
    }

    /**
     * @test
     * Assert an user can view detail program page
     *
     * @return void
     */
    public function testShowPageDetailProgram()
    {
        $response = $this->get('/program/1')
            ->assertStatus(200)
            ->assertViewIs('landing-page.show');
    }

    /**
     * @test
     * Assert an user can view detail program page
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
     * Assert an user can view transparansi page
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
     * Assert an user can view faq page
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
