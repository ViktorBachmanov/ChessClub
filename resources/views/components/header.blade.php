@props(['isTable' => false, 'isGames' => false])

<div id='header' >

	<div class='bg' style='background: url(pics/mesh5_r.png?1) center center no-repeat;
							background-size: cover; position: relative'>
							
							<div style='background: url(pics/white_figures_3_t.gif?1) center center no-repeat;
								background-size: contain; position: absolute; top: 10%; left: 10%;
								width: 80%; height: 80%'>
							</div>
		
	</div>

	<div style='flex: 1 2 30%; overflow: visible; min-width: 0;
				display: flex; justify-content: center; z-index: 101'>
		<h2>Шахматный клуб</h2>		
	</div>
	
	<div class='bg' style='background: url(pics/mesh5_l.png?1) center center no-repeat;
							background-size: cover; position: relative'>
							
							<div style='background: url(pics/black_figures_3_t.gif?1) center center no-repeat;
								background-size: contain; position: absolute; top: 10%; left: 10%;
								width: 80%; height: 80%'>
							</div>
	</div>
	
</div>

<nav>
	<a href='/' @class(['active' => $isTable])>Таблица</a>
	<a href='/games' @class(['active' => $isGames])>Игры</a>
</nav>

