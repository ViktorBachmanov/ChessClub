<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Notifications\ResetPasswordNotification;

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
	
	public function getTotalGames() {
		$whiteTotal = $this->white->count();
		$blackTotal = $this->black->count();
		$gamesTotal = $whiteTotal + $blackTotal;
		
		return $gamesTotal;
	}
}
