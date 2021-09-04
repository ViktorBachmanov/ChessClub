<?php

namespace App\Models;

use App\Models\User;

use DateTime;


//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //use HasFactory;
	
	public $timestamps = false;
	
	
	public function getWhiteFio()
    {
		return User::findOrFail($this->white)->name;
	}
	
	public function getBlackFio()
    {
		return User::findOrFail($this->black)->name;
	}
	
	public function getDate()
    {
		$date = new DateTime($this->date);
		
		return $date->format('d.m.y');
	}

	public function getWinner()
    {
		if($this->winner) {
			return User::findOrFail($this->winner)->name;
		}
		else {
			return 'Ничья';
		}
	}
	
	
}


////////////////////////////////////////////////////////////


