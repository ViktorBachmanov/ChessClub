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
				margin: 0.5rem;
			}
			
			input[type='radio'] {
				margin: 1rem;
			}
			
			button {
				margin: 1rem;
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
		
        <h3>Добавить партию</h3>
		
		<div>
			<select name='white'>
					@php
						foreach($users as $user)
						{
							echo "<option value=$user->id>$user->name</option>";
						}
					@endphp
			</select>
			
			
			<select name='black'>
					@php
						foreach($users as $user)
						{
							echo "<option value=$user->id>$user->name</option>";
						}
					@endphp
			</select>
		</div>
		
		<div>
			<input type='radio' name='winner' value='white' checked>
			<input type='radio' name='winner' value='none'>
			<input type='radio' name='winner' value='black'>
		</div>
		
		<input type='date' name='date' value='{{ date("Y-m-d"); }}'>
		
		<button>Ок</button>
		
	</form>
	
    </body>
	
</html>
