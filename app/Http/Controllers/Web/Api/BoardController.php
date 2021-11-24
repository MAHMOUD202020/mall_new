<?php

namespace App\Http\Controllers\Web\Api;

use App\Http\Controllers\Controller;
use App\Models\Board;

class BoardController extends Controller
{

    public function getAll(){

        $board = Board::all();

        return responseApi('success' , '' , $board);
    }

    public function getAllWithMedia(){

        $board = Board::with('media')->get();

        return responseApi('success' , '' , $board);
    }


    public function getAllOnFloor(){

        $board = Board::with('media')
            ->where('floor' , \request('floor_no' , 0))
            ->get();

        return responseApi('success' , '' , $board);
    }

    public function getAllOnHall(){

        $board = Board::with('media')
            ->where('floor' , \request('floor_no' , 0))
            ->where('hall' , \request('hall_no' , 0))
            ->get();

        return responseApi('success' , '' , $board);
    }

    public function getMonitor(){

        $board = Board::with('media')
            ->where('floor' , \request('floor_no' , 0))
            ->where('hall' , \request('hall_no' , 0))
            ->where('monitor' , \request('monitor' , '0'))
            ->first();

        if (!$board)
            return responseApi('false' , 'Monitor not found');

        return responseApi('success' , '' , $board);
    }

    public function getMonitorById(){

        $board = Board::with('media')->find(\request('id' , 0));

        if (!$board)
            return responseApi('false' , 'Monitor not found');

        return responseApi('success' , '' , $board);
    }


}
