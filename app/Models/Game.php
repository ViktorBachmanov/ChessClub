<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //use HasFactory;
	
	public $timestamps = false;
	
	
	public static function evalScoreUser1User2($user1Id, $user2Id) {
		$whiteScore = getColorScore('white', $user1Id, $user2Id);
		$blackScore = getColorScore('black', $user1Id, $user2Id);
		$totalScore = $whiteScore + $blackScore;
		
		//file_put_contents('debug/value.txt', "evalScoreUser1User2: " . $whiteScore . "\n", FILE_APPEND);
		
		return $totalScore;
	}
	
}


////////////////////////////////////////////////////////////

function getColorScore($color1, $user1Id, $user2Id) {
	$color2 = $color1 == 'white' ? 'black' : 'white';
	$games = Game::where($color1, $user1Id)
					->where($color2, $user2Id)
					->get();
	$score = 0;
	for($i = 0; $i < $games->count(); $i++) {
		//file_put_contents('debug/value.txt', "user1Id: " . $user1Id . "\n", FILE_APPEND);
		//file_put_contents('debug/value.txt', "game->winner: " . $games[$i]->winner . "\n", FILE_APPEND);
		if($games[$i]->winner == $user1Id) {
			$score += 1;
			//file_put_contents('debug/value.txt', "score: " . $score . "\n", FILE_APPEND);
		}
		else if(!$games[$i]->winner) {
			$score += 0.5;
			//file_put_contents('debug/value.txt', "score: " . $score . "\n", FILE_APPEND);
		}
		
	};
	
	//file_put_contents('debug/value.txt', "getColorScore return: " . $score . "\n", FILE_APPEND);
	
	return $score;
}
