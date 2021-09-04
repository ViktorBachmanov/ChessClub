<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chess</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=GFS+Didot&display=swap" rel="stylesheet">
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
		<link rel="Stylesheet" href="css/base.css">
		
				
        <!-- Styles -->
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
			
			td {
				text-align: left;
			}
			
			
        </style>
		

		
	
		
		
		<script>
			$(document).ready(function() {
				@if(Auth::check())
					/*let tableEl = document.querySelector('table');
					document.querySelector('#buttons_div').style.width = 
								tableEl.offsetWidth + 'px';*/
				@endif
				
			});
		</script>
		
    </head>
	
	
    <body>
		
		<form id='' method='post' action='/'>
			@csrf
		</form>
	
		
		
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