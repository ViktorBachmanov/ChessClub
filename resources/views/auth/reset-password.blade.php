<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Forgot password</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
	
    <body>
        <form method='post' action='/forgot-password'>
			@csrf
			
			<input type='email' name='email'></input>
			
			<input name='password' type='password'></input>
			
			<input name='password_confirmation' type='password'></input>
			
			<input hidden name='token' value={{ $request->route('token') }}></input>
			
			<button type='submit'>Ok</button>
        </form>
    </body>
</html>
