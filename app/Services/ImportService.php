<?php

namespace App\Services;

use App\Repositories\PlayersRepository;
use Illuminate\Http\Response;

class ImportService{

    public $playerRepo;

    /**
     * @description constructor
     */
    public function __construct(PlayersRepository $playerRepo){
        $this->playerRepo = $playerRepo;
    }

    /**
     * @description import player
     */
    public function importPlayer(){

        $total = 0;
        $result = [];

        $jsonResponse = file_get_contents('https://fantasy.premierleague.com/api/bootstrap-static/');
        $result = json_decode($jsonResponse, true);

        $status = Response::HTTP_BAD_REQUEST;
        $message = 'Bad Request';

        if (json_last_error() === JSON_ERROR_NONE) {
            $total = count($result['elements']);
            foreach($result['elements'] as $element){
                $element['news_added'] = date('Y-m-d H:i:s', strtotime($element['news_added']));
                $this->playerRepo->create($element);
            }

            $status = Response::HTTP_OK;
            $message = 'Successfully Imported';
        }

        return compact('status', 'message', 'total');
    }

}