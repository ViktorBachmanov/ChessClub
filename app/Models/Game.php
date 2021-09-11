<?php

namespace App\Models;

use App\Models\User;



use App\Util\ConvertDate;
//require_once app_path('Util/ConvertDate.php');


//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //use HasFactory;
	
	//use ConvertDate;
	
	
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
		return (new ConvertDate($this->date))->format();
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
	
	public function isWhiteWon()
	{
		return $this->white == $this->winner;
	}
	
	public function isBlackWon()
	{
		return $this->black == $this->winner;
	}
	
	
}


////////////////////////////////////////////////////////////


