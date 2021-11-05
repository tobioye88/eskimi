<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('currency');
            $table->double('budget_total', 15, 2);
            $table->double('budget_daily', 15, 2);
            $table->string('status');
            $table->integer('views')->default('0');
            $table->date('to');
            $table->date('from');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advert_campaigns');
    }
}
