<section style='white-space: pre'>
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
		
        $this->rating = $rating + $koef * ($score - $expectedScore);
		
        $this->save();
    }
</section>