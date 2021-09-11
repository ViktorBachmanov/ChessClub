<code class='language-php' style=' '>
public function evalRating($opponentRating, $score)
{
	$rating = $this->rating;
	$expectedScore = 1 / (1 + pow(10, ($opponentRating - $rating) / 400));
	
	$koef;
	if($rating >= 2400)
		$koef = 10;
	else if($this->getTotalGames() > 30)
		$koef = 20;
	else
		$koef = 40;
	
	$this->rating = $rating + $koef * ($score - $expectedScore);
	
	$this->save();
}	
</code>