<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


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
		
		$game->date = $request->input('date');
		
		$game->save();
		
		return redirect('/');
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
    public function destroy(/*$id*/)
    {
        $games = DB::table('games')
                ->selectRaw('MAX(id) as id')
                ->get();
				
		$game = Game::findOrFail($games[0]->id);
		$winnerId = $game->winner;
		
		$whiteUserId = $game->white;
		$blackUserId = $game->black;
		
		//file_put_contents('debug/value.txt', "Last game: " . $games . "\n", FILE_APPEND);
		file_put_contents('debug/value.txt', "\nDelete game with id: " . $games[0]->id . "\n", FILE_APPEND);
		file_put_contents('debug/value.txt', "white id: " . $whiteUserId . "\n", FILE_APPEND);
		file_put_contents('debug/value.txt', "black id: " . $blackUserId . "\n", FILE_APPEND);
		file_put_contents('debug/value.txt', "winner id: " . $winnerId . "\n", FILE_APPEND);

		Game::destroy($games[0]->id);
		
		
		$whiteUser = User::findOrFail($whiteUserId);
		$blackUser = User::findOrFail($blackUserId);
		
		$whiteUserRating = $whiteUser->rating;
		$blackUserRating = $blackUser->rating;
		
		$whiteUserScore;
		$blackUserScore;
		if($winnerId == $whiteUserId) {
			$whiteUserScore = 1;
			$blackUserScore = 0;
		}
		else if($winnerId == $blackUserId) {
			$whiteUserScore = 0;
			$blackUserScore = 1;
		}
		else {
			$whiteUserScore = 0.5;
			$blackUserScore = 0.5;
		}
		
		$whiteUser->evalOldRating($blackUserRating, $whiteUserScore);
		$blackUser->evalOldRating($whiteUserRating, $blackUserScore);
		
				
		return redirect('/');
			
		
    }
}
