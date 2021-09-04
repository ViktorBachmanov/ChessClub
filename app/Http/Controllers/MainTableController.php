<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Game;

class MainTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$users = User::all();
		$filteredUsers = $users->filter(function($user) {
			return $user->getTotalGames() > 0;
		});
		
        return view('main_table', ['users' => $filteredUsers->sortByDesc('rating')]);
    }
	
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
