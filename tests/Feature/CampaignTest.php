<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CampaignTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_GetAllCampaigns()
    {
        $response = $this->get('/api/campaigns');

        $response->assertStatus(200);
    }

    public function test_CreateNewCampaign()
    {
        $response = $this->post('/api/campaigns', [
            'name' => 'An art campaign',
            'budget_total' => 1000.00,
            'budget_daily' => 10.00,
            'to' => '2021-1-30',
            'from' => '2021-12-30',
        ]);

        $response->assertStatus(201);

    }
}
