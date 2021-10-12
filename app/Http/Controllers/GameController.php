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
        return view('game', ['action' => 'store', 
							 'users' => User::all()]);
    }
	
	
	public function delete()
    {
		return view('game', ['action' => 'destroy',
							 'users' => User::all(),
							 'game' => $this->getLastGame()]);
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
		
		$whiteUser->evalRating($blackUserRating, $whiteUserScore);
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
		$game = $this->getLastGame();
        
		$winnerId = $game->winner;
		
		$whiteUserId = $game->white;
		$blackUserId = $game->black;
		
		
		Game::destroy($game->id);
		
		
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
	
	
	private function getLastGame() {
		$games = DB::table('games')
                ->selectRaw('MAX(id) as id')
                ->get();
				
		$game = Game::findOrFail($games[0]->id);
		
		return $game;
	}
}
