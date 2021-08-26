<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reset password</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		
	
		<!-- Styles -->
		<link rel="Stylesheet" href="/css/auth.css">
        
		
		<script>
			$(document).ready(function() {
				document.body.style.height = $(window).height() + 'px';
			});
		</script>
        
    </head>
	
    <body>
        <form method='post' action='/reset-password'>
			@csrf
			
			<label>ФИО
			<input name='name'>
			</label>
			
			<label>Новый пароль
			<input name='password' type='password'>
			</label>
			
			<label>Новый пароль еще раз
			<input name='password_confirmation' type='password'>
			</label>
			
			<input type='hidden' name='token' value={{ $request->route('token') }}>
			
			<button type='submit'>Ok</button>
        </form>
    </body>
</html>
