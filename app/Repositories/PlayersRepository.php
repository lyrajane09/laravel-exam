<?php
namespace App\Repositories;
use Auth;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Connection;
use App\Players;

class PlayersRepository{
    
    /**
     * @return boolean
     * @params [array]
     * @description insert to players table
     */
    public function create($data){
        return Players::create($data);
    }

    /**
     * @return [array]
     * @description get all players
     */
    public function all_players(){
        return Players::select(DB::raw('id, CONCAT(first_name, " ", second_name) as full_name'))->get();
    }

    /**
     * @return [array]
     * @description single player detail
     */
    public function get_where($column, $value){
        return Players::where($column, $value)->first();
    }
}