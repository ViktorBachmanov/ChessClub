<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Новая партия</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
        </style>

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
				margin: 1rem;
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
        </style>
		
		<script src='js/util.js'></script>
		
		<script>
			window.onload = function() {
				selectRandomlyUserForColor('white');			
				selectRandomlyUserForColor('black');			
			};
		</script>
		
    </head>
	
	
    <body>
	
	<form id='content' method='post' action='/store'>
		@csrf
		
        <h3>Новая партия</h3>
		
		<div class='players'>			
			<div class='player'>
				<img src='pics/white.png' style='width: 2rem;'>
				<select name='white'>
						@php
							foreach($users as $user)
							{
								echo "<option value=$user->id>$user->name</option>";
							}
						@endphp
				</select>
				<input type='radio' name='winner' value='white' checked>
			</div>
			
			<div class='player' style='flex: 1 1 auto; width: 0; min-width: 2rem; text-align: center'>
				Победа
			</div>
			
			<div class='player'>
				<img src='pics/black.png' style='width: 2rem;'>
				<select name='black'>
						@php
							foreach($users as $user)
							{
								echo "<option value=$user->id>$user->name</option>";
							}
						@endphp
				</select>
				<input type='radio' name='winner' value='black'>
			</div>
			
		</div>
		
		<div class='drawn' style=''>
			Ничья
			<input type='radio' name='winner' value='none' style='margin-top: 0.5rem'>
			
		</div>
		
		<input type='date' name='date' value='{{ date("Y-m-d"); }}'>
		
		<button type='submit'>Добавить партию в базу</button>
		<button type='button' onclick='location.href="/";'>Отмена</button>
		
	</form>
	
    </body>
	
</html>
