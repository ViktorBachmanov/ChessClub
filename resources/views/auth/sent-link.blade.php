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
			
			#card {
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: space-evenly;
				height: 10rem;
				width: 15rem;
				box-shadow: 0px 0px 3px 2px gray;
				text-align: center;
				border-radius: 1rem;
			}
			
			#message {
				padding: 0.25rem;
				
			}
			
			.success {
				background-color: lightgreen;
			}
			
			.failed {
				background-color: tomato;
				color: white;
			}
				
			
			a {
				text-decoration: none;
				background-color: LightGray;
				padding: 0.5rem;
				border-radius: 0.5rem;
				text-shadow: 2px 2px 1px white;
				
			}
			
        </style>
		
		<script>
			$(document).ready(function() {
				document.body.style.height = $(window).height() + 'px';
				
				let messageEl = document.getElementById('message');
				let status = '{{ $status }}';
				switch( status ) {
					case 'sent':
						messageEl.classList.add('success');
						break;
						
					default:
						messageEl.classList.add('failed');
						break;
					
				}
			});
		</script>
		
    </head>
	
    <body>
        <div id='card'>
		  <div id='message'>
		@switch($status)
			@case('sent')
				Ссылка на сброс пароля отправлена на почту {{ $email }}
				@break
				
			@case('email_absences')
				Email не указан
				@break
				
			@default
				Ошибка
		@endswitch
		  </div>
			
			
			<a href='/'>Перейти на главную</a>
        </div>
    </body>
</html>
