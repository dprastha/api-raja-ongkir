<?php

namespace Tests\Unit;

use Tests\TestCase;

class OngkirTest extends TestCase
{
    // use RefreshDatabase;

    public function test_ongkir_success()
    {
        $response = $this->json('GET', '/', [
            'origin' => 501,
            'destination' => 114,
            'weight' => 1700,
            'courier' => 'jne'
        ]);

        $response
            ->assertStatus(200);
    }

    public function test_ongkir_failed()
    {
        $response = $this->json('GET', '/', [
            'origin' => 501,
            'destination' => 114,
            'weight' => 1700,
            'courier' => ''
        ]);

        $response
            ->assertStatus(200);
    }
}
