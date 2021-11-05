<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertCampaign extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'currency', 'budget_total', 'budget_daily', 'status', 'views', 'to', 'from'];

    public function images()
    {
        return $this->hasMany(AdvertCampaignImage::class);
    }
}
