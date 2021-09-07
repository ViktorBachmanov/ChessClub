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
		
		
		<script src='js/util.js?3'></script>
		
	
		<link rel="Stylesheet" href="css/base.css?12">
		
				
        <!-- Styles -->
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
				text-align: center;
            }
			
			td {
				text-align: left;
			}
			
			button {
				display: inline-block;
				margin: 0 1rem 0.5rem;
			}
			
			#buttons_div {
				text-align: center;
				margin-bottom: 1rem;
			}
			
			.cell {
				display: flex;
				justify-content: space-between;;
			}
			
			.winner {
				background-color: rgba(50, 252, 84, 0.11);
			}
        </style>
		

		
	
		
		
		<script>
			$(document).ready(function() {
				@if(Auth::check())
					/*let tableEl = document.querySelector('table');
					document.querySelector('#buttons_div').style.width = 
								tableEl.offsetWidth + 'px';*/
				@endif
				
				/*let tableWidth = document.querySelector('table').offsetWidth;
				setBodyWidth(tableWidth);*/
				
			});
		</script>
		
    </head>
	
	
    <body>
		<div style='display: inline-block; margin: 0 auto; '>
	
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
				<th>Дата
				<th>Черные
			</thead>
			
			<tbody>
				@foreach($games as $game)
					<tr>
						<td @class(['winner' => $game->isWhiteWon()])>{{ $game->getWhiteFio(); }}
						<td>{{ $game->getDate(); }}
						<td @class(['winner' => $game->isBlackWon()])>{{ $game->getBlackFio(); }}
					</tr>
				@endforeach
				
			</tbody>
		</table>
		
		</div>
    </body>
	
</html>
