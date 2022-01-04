<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoinInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('coininfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('coin_name');
            $table->text('coin_img');
            $table->tinyText('chain');
            $table->tinyText('symbol');
            $table->tinyText('network_chain');
            $table->tinyText('project_phase');
            $table->text('contract_addr');
            $table->string('chart_link');
            $table->string('swap_link');
            $table->string('web_link');
            $table->string('telegram_link');
            $table->string('twitter_link');
            $table->string('discord_link');
            $table->string('coin_mrkt_link');
            $table->string('coin_geko_link');
            $table->string('launch');
            $table->longText('description');
            $table->string('marketcap');
            $table->string('price_usd');
            $table->text('votes_total');
            $table->text('today_votes');
            $table->text('voting_date');
            $table->tinyText('watchlist');
            $table->tinyText('status');
            $table->tinyText('promote_position');
            $table->timestamp('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
