<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Notifications\ResetPasswordNotification;

use App\Models\Game;


class User extends Authenticatable
{
    //use HasFactory, Notifiable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	 
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
	
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	
	public $timestamps = false;
	
	
	/**
 * Send a password reset notification to the user.
 *
 * @param  string  $token
 * @return void
 */
public function sendPasswordResetNotification($token)
{
    //$url = '/reset-password?token='.$token;
    $url = '/reset-password';

    $this->notify(new ResetPasswordNotification($url, $token));
}
	
	
	public function white()
    {
        return $this->hasMany(Game::class, 'white');
    }
	
	public function black()
    {
        return $this->hasMany(Game::class, 'black');
    }
	
	
	public function getColorForDay($color, $day)
    {
		if($day == 'all') {
			return Game::where($color, $this->id);
			
		}
		else {
			return Game::where($color, $this->id)
					->where('date', $day);
		}
    }
	
	
	public function evalRating($opponentRating, $score)
    {
		$rating = $this->rating;
        $expectedScore = 1 / (1 + pow(10, ($opponentRating - $rating) / 400));
		
		
		$gamesTotal = $this->getTotalGames();
		$koef;
		if($rating >= 2400)
			$koef = 10;
		else if($gamesTotal > 30)
			$koef = 20;
		else
			$koef = 40;
		
		//file_put_contents('debug/value.txt', "whiteTotal: " . $whiteTotal . "\n", FILE_APPEND);
		//file_put_contents('debug/value.txt', "blackTotal: " . $blackTotal . "\n", FILE_APPEND);
		file_put_contents('debug/value.txt', "expected score: " . $expectedScore . "\n", FILE_APPEND);
		file_put_contents('debug/value.txt', "gamesTotal: " . $gamesTotal . "\n", FILE_APPEND);
		file_put_contents('debug/value.txt', "koef: " . $koef . "\n", FILE_APPEND);
		
		$this->rating = $rating + $koef * ($score - $expectedScore);
		
		$this->save();
		
		file_put_contents('debug/value.txt', "rating: " . $this->rating . "\n\n", FILE_APPEND);
    }
	
	
	public function evalOldRating($opponentRating, $score)
    {
		$rating = $this->rating;
        $expectedScore = 1 / (1 + pow(10, ($opponentRating - $rating) / 400));
		
		
		$gamesTotal = $this->getTotalGames();
		$koef;
		if($rating >= 2400)
			$koef = 10;
		else if($gamesTotal > 30)
			$koef = 20;
		else
			$koef = 40;
		
		//file_put_contents('debug/value.txt', "whiteTotal: " . $whiteTotal . "\n", FILE_APPEND);
		//file_put_contents('debug/value.txt', "blackTotal: " . $blackTotal . "\n", FILE_APPEND);
		file_put_contents('debug/value.txt', "\nEval old rating\n", FILE_APPEND);
		file_put_contents('debug/value.txt', "expected score: " . $expectedScore . "\n", FILE_APPEND);
		file_put_contents('debug/value.txt', "gamesTotal: " . $gamesTotal . "\n", FILE_APPEND);
		file_put_contents('debug/value.txt', "koef: " . $koef . "\n", FILE_APPEND);
		
		$this->rating = $rating - $koef * ($score - $expectedScore);
		
		$this->save();
		
		file_put_contents('debug/value.txt', "rating: " . $this->rating . "\n\n", FILE_APPEND);
    }
	
	public function getTotalGames($day = 'all') {
		$whiteTotal = $this->getColorForDay('white', $day)->count();
		$blackTotal = $this->getColorForDay('black', $day)->count();
		$gamesTotal = $whiteTotal + $blackTotal;
		
		return $gamesTotal;
	}
	
	
	public function evalTotalScore($day) {
		$totalScore = 0;
		
		$users = User::all();
		for($i = 0; $i < $users->count(); $i++) {
			if($users[$i]->id == $this->id)
				continue;
			
			$totalScore += $this->evalScore($users[$i]->id, $day);
		}
		
		return $totalScore;
	}	
	
	public function evalScore($opponentId, $day) {
		$whiteScore = $this->getColorScore('white', $opponentId, $day);
		$blackScore = $this->getColorScore('black', $opponentId, $day);
		$totalScore = $whiteScore + $blackScore;
		
		//file_put_contents('debug/value.txt', "evalScoreUser1User2: " . $whiteScore . "\n", FILE_APPEND);
		
		return $totalScore;
	}
	
	private function getColorScore($color1, $opponentId, $day) {
		$color2 = $color1 == 'white' ? 'black' : 'white';
		
		$games;
		
		if($day == 'all') {
			$games = Game::where($color1, $this->id)
						->where($color2, $opponentId)
						->get();
		}
		else {
			$games = Game::where($color1, $this->id)
						->where($color2, $opponentId)
						->where('date', $day)
						->get();		
		}
		
		
		$score = 0;
		for($i = 0; $i < $games->count(); $i++) {
			//file_put_contents('debug/value.txt', "user1Id: " . $user1Id . "\n", FILE_APPEND);
			//file_put_contents('debug/value.txt', "game->winner: " . $games[$i]->winner . "\n", FILE_APPEND);
			if($games[$i]->winner == $this->id) {
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
}
