<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use App\Models\Game;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new_game', ['users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$whiteUserId = $request->input('white');
		$blackUserId = $request->input('black');
		
		$whiteUser = User::findOrFail($whiteUserId);
		$blackUser = User::findOrFail($blackUserId);
		
		$whiteUserRating = $whiteUser->rating;
		$blackUserRating = $blackUser->rating;
		
		$game = new Game;
		
		$game->white = $whiteUserId;
		$game->black = $blackUserId;
		
		$whiteUserScore;
		$blackUserScore;
		switch($request->input('winner')) {
			case 'white':
				$whiteUserScore = 1;
				$blackUserScore = 0;
				$game->winner = $whiteUserId;
				break;
				
			case 'black':
				$whiteUserScore = 0;
				$blackUserScore = 1;
				$game->winner = $blackUserId;
				break;
				
			case 'none':
				$whiteUserScore = 0.5;
				$blackUserScore = 0.5;
				break;
			
		}
		
		file_put_contents('debug/value.txt', "Игрок: " . $whiteUser->name . "\n", FILE_APPEND);		
		$whiteUser->evalRating($blackUserRating, $whiteUserScore);
		file_put_contents('debug/value.txt', "Игрок: " . $blackUser->name . "\n", FILE_APPEND);
		$blackUser->evalRating($whiteUserRating, $blackUserScore);
		
		$game->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
