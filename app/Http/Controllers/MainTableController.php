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
		$day;
		if($request->has('day')) {
			$day = $request->day;
		}
		else {
			$day = 'all';
		}
		
        return view('main_table', $this->formDataArray($day));
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
		$day;
		if($request->has('day')) {
			$day = $request->day;
		}
		else {
			$day = 'all';
		}
		return view('desc', $this->formDataArray($day));
    }
	
	
	private function formDataArray($day) {
		return ['users' => $this->getTableUsers($day),
				'days' => DB::table('games')->pluck('date')->unique(),
				'day' => $day];
	}
	
	
	private function getTableUsers($day)
	{
		$users = User::all();
		$filteredUsers = $users->filter(function($user) use ($day) {
			return $user->getTotalGames($day) > 0;
		});
		
		return $filteredUsers->sortByDesc('rating');		
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
