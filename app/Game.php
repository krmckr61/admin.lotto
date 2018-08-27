<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClientBoard;

class Game extends Model
{
    protected $table = 'game';
    protected $primaryKey = 'id';

    public static function getLastGameDetail()
    {
        $return = [];
        $return['lastGame'] = Game::where('active', false)->orderBy('id', 'DESC')->first();
        if($return['lastGame']) {
            $return['firstZinc'] = ClientBoard::select('clientboard.*', 'client.name')->join('client', 'clientboard.clientid', '=', 'client.id')->where([['clientboard.gameid', $return['lastGame']->id], ['clientboard.firstzinc', true]])->get();
            $return['secondZinc'] = ClientBoard::select('clientboard.*', 'client.name')->join('client', 'clientboard.clientid', '=', 'client.id')->where([['clientboard.gameid', $return['lastGame']->id], ['clientboard.secondzinc', true]])->get();
            $return['bingo'] = ClientBoard::select('clientboard.*', 'client.name')->join('client', 'clientboard.clientid', '=', 'client.id')->where([['clientboard.gameid', $return['lastGame']->id], ['clientboard.bingo', true]])->get();
        }

        return $return;
    }

}
