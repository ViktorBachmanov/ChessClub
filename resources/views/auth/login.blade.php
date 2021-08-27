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
		<link rel="Stylesheet" href="css/auth.css">
        
		
		<script>
			$(document).ready(function() {
				document.body.style.height = $(window).height() + 'px';
			});
		</script>
		
    </head>
	
    <body>
        <form method='post' action='/login'>
			@csrf
			
			@if(session('status'))
				<span style='background-color: lightgreen'>Пароль обновлен</span>
			@endif
			
			<label>ФИО
			<input name='name'>
			</label>
			
			<label>Пароль
			<input name='password' type='password'>
			</label>
			
			<label>Запомнить меня 
			<input type='checkbox' name='remember' style='display: inline;' checked>
			</label>
			
			<button type='submit'>Войти</button>
			
			<a href='/forgot-password'>Забыли пароль?</a>
        </form>
    </body>
</html>
