<?php

namespace Database\Seeders;

use App\Models\AdvertCampaign;
use Illuminate\Database\Seeder;

class AdvertCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdvertCampaign::factory()
            ->count(50)
            ->hasImages(1)
            ->create();
    }
}
