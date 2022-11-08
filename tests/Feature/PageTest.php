<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_landing_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create_producto(){
        
        $response = $this->post('/producto', 
        ['name' => 'Prueba Producto correcto',
        'price' => 500,
        'prod_picture' => 'producto4.jpg',
        'desc' => 'prueba producto bien',
        'hours' => 2
        ]);

        $response->assertStatus(302); //200 es que salga todo bien, pero como hay un redirect, sale 302 pero está bien
    }

    public function test_validar_producto(){
        $response = $this->post('/producto',
        ['name' => '',
        'price' => '',
        'prod_picture' => 'producto4.jpg',
        'desc' => 'prueba producto no valido',
        'hours' => 2]);

        $response->assertSessionHasErrors(['name', 'price']);
    }
}
