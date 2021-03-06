<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		@php
			$title = $action == 'store' ? 'Новая партия' : 'Последняя партия';
		@endphp

        <title>{{ $title }}</title>	
		

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        <!-- Styles -->
       <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
			
			#content {
				display: flex;
				flex-direction: column;
				align-items: center;
			}
			
			select {
				margin: 0.75rem 0 1.5rem 0;
			}
			
			input[type='radio'] {
				margin-bottom: 0.25rem;
			}
			
			button {
				margin: 1.5rem;
			}
			
			.players {
				display: flex;
				align-items: flex-end;
				/*justify-content: space-evenly;*/
				margin: 1rem;
			}
			
			.player {
				display: flex;
				flex-direction: column;
				align-items: center;
				flex: 1 1 auto;
				margin: 0;
				text-align: center;
			}
			
			.drawn {
				display: flex;
				flex-direction: column;
				align-items: center;
				margin-bottom: 2rem;
			}
			
			input[type='date'] {
				margin-bottom: 2rem;
			}
			
			select {
				background-color: white;
				transition-property: background-color;
				transition-duration: 0.5s;
			}
			
			select.self {
				background-color: LightSalmon;
			}
        </style>
		
		
    </head>
	
	
    <body>
	
	<form id='content' method='post'>
		@csrf
		
        <h3>{{ $title }}</h3>
		
		<div class='players'>			
			<div class='player'>
				<img src='pics/white.png' style='width: 2rem;'>
				<select name='white'>
					@foreach($users as $user)
						<option value={{ $user->id }}
						  @if($action == 'destroy')
							@if($user->id == $game->white)
								selected
							@endif
						  @endif
						 >
							{{ $user->name }}
						</option>
					@endforeach
				</select>
				<input type='radio' name='winner' value='white'>
			</div>
			
			<div class='player' style='flex: 1 1 auto; width: 0; min-width: 2rem; text-align: center'>
				Победа
			</div>
			
			<div class='player'>
				<img src='pics/black.png' style='width: 2rem;'>
				<select name='black'>
					@foreach($users as $user)
						<option value={{ $user->id }}
						  @if($action == 'destroy')
							@if($user->id == $game->black)
								selected
							@endif
						  @endif
						 >
							{{ $user->name }}
						</option>
					@endforeach
				</select>
				<input type='radio' name='winner' value='black'>
			</div>
			
		</div>
		
		<div class='drawn' style=''>
			Ничья
			<input type='radio' name='winner' value='none' style='margin-top: 0.5rem'
				{{ $action == 'store' ? 'checked' : '' }}
			>
			
		</div>
		
		<input type='date' name='date' 
			value='{{ $action == "store" ? date("Y-m-d") : $game->date; }}'>
		
		<x-submit :action="$action">
		</x-submit>
		<button type='button' onclick='location.href="/games";'>Отмена</button>
		
	</form>
	
    </body>

								
	@if($action == 'store')
		<script src='js/storeGame.js?2'></script>		
	@else
		@php
		$winner;
		if( (int)($game->winner == $game->white) ) {
			$winner = 'white';
		}
		else if( (int)($game->winner == $game->black) ) {
			$winner = 'black';
		}
		else {
			$winner = 'none';
		}
		@endphp
		<script>
			var winner = "{{ $winner }}";
		</script>
		<script src='js/deleteGame.js?2'></script>
	@endif
	
</html>
