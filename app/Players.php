<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model{

    protected $table = 'players';

    protected $fillable = [
        'chance_of_playing_next_round',
        'chance_of_playing_this_round',
        'code',
        'cost_change_event',
        'cost_change_event_fall',
        'cost_change_start',
        'cost_change_start_fall',
        'dreamteam_count',
        'element_type',
        'ep_next',
        'ep_this',
        'event_points',
        'form',
        'in_dreamteam',
        'news_added',
        'now_cost',
        'photo',
        'points_per_game',
        'first_name',
        'second_name',
        'selected_by_percent',
        'special',
        'status',
        'team',
        'team_code',
        'total_points',
        'transfers_in',
        'transfers_in_event',
        'transfers_out',
        'transfers_out_event',
        'value_form',
        'value_season',
        'web_name',
        'minutes',
        'goals_scored',
        'assists',
        'clean_sheets',
        'goals_conceded',
        'own_goals',
        'penalties_saved',
        'penalties_missed',
        'yellow_cards',
        'red_cards',
        'saves',
        'bonus',
        'bps',
        'influence',
        'creativity',
        'threat',
        'ict_index'
    ];

    /**
     * @description [set chance_of_playing_this_round attribute]
     */
    public function setChanceOfPlayingNextRoundAttribute($value)
    {
        $this->attributes['chance_of_playing_next_round'] = ($value == 0) ? 0 : $value;
    }

    /**
     * @description [set chance_of_playing_this_round attribute]
     */
    public function setChanceOfPlayingThisRoundAttribute($value)
    {
        $this->attributes['chance_of_playing_this_round'] = ($value == 0) ? 0 : $value;
    }

    /**
     * @description [set ep_next attribute]
     */
    public function setEpNextAttribute($value){
        $this->attributes['ep_next'] = ($value == 0) ? 0 : $value;
    }

    /**
     * @description [set ep_this attribute]
     */
    public function setEpThisAttribute($value){
        $this->attributes['ep_this'] = ($value == 0) ? 0 : $value;
    }

   

}