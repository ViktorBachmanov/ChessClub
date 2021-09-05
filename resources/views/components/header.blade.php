@props(['isTable' => false, 'isGames' => false])

<div id='header' style=''>

	<h2>Шахматный клуб</h2>
	
	<a href='/' @class(['active' => $isTable])>Таблица</a>
	<a href='/games' @class(['active' => $isGames])>Игры</a>
	
</div>
