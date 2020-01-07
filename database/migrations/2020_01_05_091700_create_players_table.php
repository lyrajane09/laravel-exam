<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('chance_of_playing_next_round')->nullable();
            $table->integer('chance_of_playing_this_round')->nullable();
            $table->bigInteger('code');
            $table->integer('cost_change_event');
            $table->integer('cost_change_event_fall');
            $table->integer('cost_change_start');
            $table->integer('cost_change_start_fall');
            $table->integer('dreamteam_count');
            $table->integer('element_type');
            $table->decimal('ep_next', 8, 1)->nullable();
            $table->decimal('ep_this', 8, 1)->nullable();
            $table->integer('event_points');
            $table->decimal('form', 8, 1)->default(0.0);
            $table->boolean('in_dreamteam');
            $table->string('news')->nullable();
            $table->dateTime('news_added');
            $table->integer('now_cost');
            $table->string('photo');
            $table->decimal('points_per_game', 8, 1)->default(0.0);
            $table->string('first_name');
            $table->string('second_name');
            $table->decimal('selected_by_percent', 8, 1)->default(0.0);
            $table->boolean('special');
            $table->string('squad_number')->nullable();
            $table->string('status');
            $table->integer('team');
            $table->integer('team_code');
            $table->bigInteger('total_points');
            $table->bigInteger('transfers_in');
            $table->bigInteger('transfers_in_event');
            $table->bigInteger('transfers_out');
            $table->bigInteger('transfers_out_event');
            $table->decimal('value_form', 8, 1)->default(0.0);
            $table->decimal('value_season', 8, 1)->default(0.0);
            $table->string('web_name');
            $table->bigInteger('minutes');
            $table->integer('goals_scored');
            $table->integer('assists');
            $table->integer('clean_sheets');
            $table->integer('goals_conceded');
            $table->integer('own_goals');
            $table->integer('penalties_saved');
            $table->integer('penalties_missed');
            $table->integer('yellow_cards');
            $table->integer('red_cards');
            $table->integer('saves');
            $table->integer('bonus');
            $table->integer('bps');
            $table->decimal('influence', 8, 1)->default(0.0);
            $table->decimal('creativity', 8, 1)->default(0.0);
            $table->decimal('threat', 8, 1)->default(0.0);
            $table->decimal('ict_index', 8, 1)->default(0.0);
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
        Schema::dropIfExists('players');
    }
}
