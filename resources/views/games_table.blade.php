<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>Chess</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=GFS+Didot&display=swap" rel="stylesheet">
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		
		<script src='js/util.js?1'></script>
		
	
		<link rel="Stylesheet" href="css/base.css?7">
		
				
        <!-- Styles -->
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
			
			td {
				text-align: left;
			}
			
			button {
				display: inline-block;
				margin: 1rem;
			}
			
			#buttons_div {
				text-align: center;
				margin-bottom: 1rem;
			}
			
			
        </style>
		

		
	
		
		
		<script>
			$(document).ready(function() {
				@if(Auth::check())
					/*let tableEl = document.querySelector('table');
					document.querySelector('#buttons_div').style.width = 
								tableEl.offsetWidth + 'px';*/
				@endif
				
				setBodyWidth();
				
			});
		</script>
		
    </head>
	
	
    <body>
	
		<x-header :isGames='true'/>
		
		<form id='' method='post' action='/'>
			@csrf
		</form>
		
		
		@if(Auth::check())
			<div id='buttons_div' style=''>
				<button onclick='location.href = "/new"'>Добавить</button>
				<button onclick='location.href = "/del"'>Удалить</button>
			</div>
		@endif
	
		
		
		<table>
			<thead>
				<th>Белые
				<th>Черные
				<th>Дата
				<th>Выиграл
			</thead>
			
			<tbody>
				@foreach($games as $game)
					<tr>
						<td>{{ $game->getWhiteFio(); }}
						<td>{{ $game->getBlackFio(); }}
						<td>{{ $game->getDate(); }}
						<td>{{ $game->getWinner(); }}
					</tr>
				@endforeach
				
			</tbody>
		</table>
		
		
    </body>
	
</html>
