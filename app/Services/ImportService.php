<?php

namespace App\Services;

use App\Player;
use Illuminate\Http\Response;

class ImportService
{

    /**
     * @description import player
     */
    public function importPlayer($resource_url = 'https://fantasy.premierleague.com/api/bootstrap-static/'){

        $total = 0;
        $result = [];

        try {
            $jsonResponse = file_get_contents($resource_url);
            $result = json_decode($jsonResponse, true);

            $total = count($result['elements']);
            foreach($result['elements'] as $element){
                $element['news_added'] = date('Y-m-d H:i:s', strtotime($element['news_added']));
                Player::create($element);
            }

            $status = Response::HTTP_OK;
            $message = 'Successfully Imported';
        } catch(\Exception $e) {
            $status = Response::HTTP_BAD_REQUEST;
            $message = 'Bad Request';
        }
        
        return compact('status', 'message', 'total');
    }

}