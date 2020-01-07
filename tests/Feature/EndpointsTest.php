<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EndpointsTest extends TestCase
{
    public function testHome()
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function testRootApi()
    {
        $response = $this->get('/api');

        $response->assertNotFound();
    }

    public function testPlayersList()
    {
        $response = $this->json('GET', '/api/players');

        $total = 589;

        $response
            ->assertOk()
            ->assertJsonStructure([
                'status',
                'message',
                'total',
                'data' => [
                    ['id', 'full_name']
                ],
            ])
            ->assertJson([
                'status' => 200,
                'message' => 'Success',
                'total' => $total,
                // 'data' => [],
            ])
            ->assertJsonCount($total, 'data');
    }

    public function testPlayersSingleWithCorrectID()
    {
        $response = $this->json('GET', '/api/players/1');

        $response
            ->assertOk()
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'first_name',
                    'second_name',
                    'form',
                    'total_points',
                    'influence',
                    'creativity',
                    'threat',
                    'ict_index',
                ],
            ])
            ->assertJson([
                'status' => 200,
                'message' => 'Success',
                'data' => [
                    'id' => '1',
                    'first_name' => 'Shkodran',
                    'second_name' => 'Mustafi',
                    'form' => '0.3',
                    'total_points' => '6',
                    'influence' => '32.2',
                    'creativity' => '1.2',
                    'threat' => '54.0',
                    'ict_index' => '8.8',
                ]
            ]);
    }

    public function testPlayersSingleWithWrongID()
    {
        $response = $this->json('GET', '/api/players/somewrongid');

        $response->assertNotFound();
    }
}
