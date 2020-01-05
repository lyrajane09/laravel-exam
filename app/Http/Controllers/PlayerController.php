<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Response;
use App\User;
use App\Services\ImportService as ImportService;
use App\Repositories\PlayersRepository;

class PlayerController extends Controller
{

    public $playerRepo;

    /**
     * @description constructor
     */
    public function __construct(PlayersRepository $playerRepo){
        $this->playerRepo = $playerRepo;
    }

    /**
     * @return [boolean] status
     * @param [link]
     */
    public function import(Request $request){

        $result = array();
        $status = '';
        $message = '';
        $total = 0;
        
        #call import service
        $impServ = new ImportService(new \App\Repositories\PlayersRepository);
        $impServ = $impServ->importPlayer();

        return response()->json(
            [
                'status' => $impServ['status'], 
                'message' => $impServ['message'], 
                'total' => $impServ['total']
            ], 
            Response::HTTP_OK,
            [], 
            JSON_PRETTY_PRINT
        ); 
        
    }

    /**
     * @return [array, ID, full name]
     * @description list of all players
     */
    public function all_players(Request $request){
        $result = $this->playerRepo->all_players();

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
    public function single_player(Request $request){
        $result = $this->playerRepo->get_where('id', $request->playerID);

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
}