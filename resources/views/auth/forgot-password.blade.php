<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Forgot password</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
		
		<link rel="Stylesheet" href="css/auth.css">
		
        <style>
			form {
				height: 10rem;
			}			
        </style>
		
		<script>
			$(document).ready(function() {
				document.body.style.height = $(window).height() + 'px';
			});
		</script>

    </head>
	
    <body>
        <form method='post' action='/forgot-password'>
			@csrf
			
			<label>ФИО
			<input name='name'>
			</label>
	
			<div>
				<button type='submit' style='margin-right: 1rem'>Ок</button>
				<button type='button' onclick='location.href="/";'>Отмена</button>
			</div>
        </form>
    </body>
</html>
