<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		
		
		
		<!-- Styles -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
				
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: center;
            }
			
			form {
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: space-evenly;
				height: 20rem;
				width: 15rem;
				box-shadow: 0px 0px 3px 2px gray;
			}
				
			label {
				text-align: center;
			}
			
			input {
				display: block;
				margin-top: 0.5rem;
			}
			
			a {
				text-decoration: none;
			}
			
        </style>
		
		<script>
			$(document).ready(function() {
				document.body.style.height = $(window).height() + 'px'
			});
		</script>
		
    </head>
	
    <body>
        <form method='post' action='/login'>
			@csrf
			
			<label>ФИО
			<input name='name'></input>
			</label>
			
			<label>Пароль
			<input name='password' type='password'></input>
			</label>
			
			<label>Запомнить меня 
			<input type='checkbox' name='remember' style='display: inline;' checked>
			</label>
			
			<button type='submit'>Log in</button>
			
			<a href='/forgot-password'>Забыли пароль?</a>
        </form>
    </body>
</html>
