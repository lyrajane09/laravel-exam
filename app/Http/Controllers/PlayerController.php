<?php

namespace App\Http\Controllers;

use App\Player;
use App\Http\Resources\PlayersList as PlayersListResource;
use App\Http\Resources\Player as PlayerResource;
use Illuminate\Http\Response;

class PlayerController extends Controller
{
    /**
     * @return [array, ID, full name]
     * @description list of all players
     */
    public function index()
    {
        $result = PlayersListResource::collection(Player::all());

        return response()->json(
            [
                'status' => Response::HTTP_OK, 
                'message' => 'Success', 
                'total' => ($result) ? $result->count() : 0, 
                'data' => $result
            ], 
            Response::HTTP_OK,
            [],
            JSON_PRETTY_PRINT
        ); 
    }

    /**
     * @return [array]
     * @description single player details
     */
    public function show(Player $player)
    {
        $result = new PlayerResource($player);

        return response()->json(
            [
                'status' => ($result) ? Response::HTTP_OK : Response::HTTP_NOT_FOUND, 
                'message' => ($result) ? 'Success' : 'Not found',
                'data' => $result
            ], 
            ($result) ? Response::HTTP_OK : Response::HTTP_NOT_FOUND,
            [], 
            JSON_PRETTY_PRINT
        );  
    }
}