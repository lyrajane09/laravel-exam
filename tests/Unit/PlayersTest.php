<?php

namespace Tests\Unit;

use Tests\TestCase;

class PlayersTest extends TestCase
{
    /**
     * @description test get all players
     */
    public function testGettingAllPlayers()
    {
        $response = $this->json('GET', '/api/all-players');
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'status',
            'message',
            'total',
            'data',        
        ]);
    }

    /**
     * @description test get single player
     */
    public function testGettingSinglePlayer()
    {
        $response = $this->json('GET', '/api/single-player/4000');
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'status',
            'message',
            'total',
            'data',        
        ]);
    }

    /**
     * @description import player
     */
    public function testImportPlayer()
    {
        $response = $this->json('GET', '/api/import');
        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 200, 
                'message' => 'Successfully Imported',
                'total' => 587
            ]);
    }
}
