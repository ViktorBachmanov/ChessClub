<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    //use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 /*
    protected $fillable = [
        'name',
        'email',
        'password',
    ];*/

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	 /*
    protected $hidden = [
        'password',
        'remember_token',
    ];*/

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
	 /*
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/
	
	
	public $timestamps = false;
	
	
	public function games()
    {
        return $this->hasMany(Game::class);
    }
	
	
	public function evalRating($opponentRating, $score)
    {
		$rating = $this->rating;
        $expectedScore = 1 / (1 + pow(10, ($opponentRating - $rating) / 400));
		
		$gamesTotal = $this->games->count();
		
		$koef;
		if($rating >= 2400)
			$koef = 10;
		else if($gamesTotal > 30)
			$koef = 20;
		else
			$koef = 40;
		
		file_put_contents('debug/value.txt', "gamesTotal: " . $gamesTotal . "\n", FILE_APPEND);
		file_put_contents('debug/value.txt', "koef: " . $koef . "\n", FILE_APPEND);
		
		$this->rating = $rating + $koef * ($score - $expectedScore);
		
		file_put_contents('debug/value.txt', "rating: " . $this->rating . "\n", FILE_APPEND);
    }
}
