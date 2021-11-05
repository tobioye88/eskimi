<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertCampaignImage extends Model
{
    use HasFactory;
    protected $fillable = ['advert_campaign_id','image_name'];

    public function advertCampaign()
    {
        return $this->belongsTo(AdvertCampaign::class);
    }
}
