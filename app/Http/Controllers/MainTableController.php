<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Game;

use Illuminate\Support\Facades\DB;


class MainTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
		return view('main_table', $this->formDataArray($request));
    }
	
	/*
	public function day(Request $request)
    {
		$day = $request->day;
		
        return view('main_table', ['users' => $this->getTableUsers($day),
									'days' => DB::table('games')->pluck('date')->unique(),
									'day' => $day]);
    }*/
	
	
	public function desc(Request $request)
    {
		return view('desc', $this->formDataArray($request));
    }
	
	
	private function formDataArray($request) {
		$day;
		$sorting;
		if($request->has('day')) {
			$day = $request->day;
			$sorting = $request->sorting;
		}
		else {
			$day = 'all';
			$sorting = 'rating';
		}
		
		return ['users' => $this->getTableUsers($day, $sorting),
				'days' => DB::table('games')->pluck('date')->unique(),
				'day' => $day,
				'sorting' => $sorting];
	}
	
	
	private function getTableUsers($day, $sorting)
	{
		$users = User::all();
		$filteredUsers = $users->filter(function($user) use ($day) {
			return $user->getTotalGames($day) > 0;
		});
		
		if($sorting == 'rating')		
			return $filteredUsers->sortByDesc('rating');
		else {
			 $sortedUsers = $filteredUsers->sort(function($a, $b) use ($day) {
				$scoreA = $a->evalTotalScore($day);
				$scoreB = $b->evalTotalScore($day);
				
				if($scoreA == $scoreB)
					return 0;
				else if($scoreA > $scoreB)
					return -1;
				else
					return 1;
			});
			
			$sortedUsers = $sortedUsers->sort(function($a, $b) use ($day) {
				$gamesA = $a->getTotalGames($day);
				$gamesB = $a->getTotalGames($day);
				
				if($gamesA == $gamesB)
					return 0;
				else if($gamesA > $gamesB)
					return -1;
				else
					return 1;
			});
			
			return $sortedUsers;
		}
	}
	/*
	private function getDays()
	{
		return Game::all()->unique();
	}*/
	
	/*
	public function select(Request $request)
    {
		$users;
		$sortingType = $request->sorting;
		if($sortingType == 'score') {
			$users = User::all()->sort(function($a, $b) {
				//return $a->
			});
		}
		//$users = 
		//return view('main_table', ['users' => $users]);
	}*/

}
