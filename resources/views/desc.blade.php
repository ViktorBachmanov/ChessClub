<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Описание</title>

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
			
			.fio {
				text-align: left;
			}
			
			.self {
				min-width: 2.5rem;
				max-width: 2.5rem;
				min-height: 2.5rem;
				max-height: 2.5rem;
				padding: 0;				
				/*position: relative;*/
				
				
				background: linear-gradient(170deg, rgb(245,245,255) 0%,
													rgb(235,240,245) 55%,
													rgb(205,215,225) 100%);
			}
			/*
			.medal {
				width: 100%;
				vertical-align: middle;
			}*/
			
			.medal {
				width: 2rem;
				height: 2rem;
				border-radius: 1rem;
				margin: auto auto;
				vertical-align: middle;													
				font-family: 'GFS Didot', serif;				
				display: flex;
				align-items: center;
				justify-content: center;				
			}
			
			.gold {
				background: linear-gradient(170deg, rgb(252, 220, 107) 0%,													
													rgb(255, 254, 182) 100%);
				box-shadow: 1px 1px 1px rgb(255,180,68);
				color: rgb(255, 254, 182);
				text-shadow: 1px 1px 1px rgb(255,180,68);
			}
			
			.silver {
				background: linear-gradient(170deg, rgb(220,220,220) 0%,													
													rgb(253,245,237) 100%);
				box-shadow: 1px 1px 1px rgb(210,205,200);
				color: rgb(253,245,237);
				text-shadow: 1px 1px 1px rgb(210,205,200);
			}
			
			.bronze {
				background: linear-gradient(170deg, rgb(237,173,102) 0%,													
													rgb(255,219,44) 100%);
				box-shadow: 1px 1px 1px rgb(237,173,102);
				color: rgb(255,219,44);
				text-shadow: 1px 1px 1px rgb(237,173,102);
			}
			
			.wood {
				background-image: url('pics/pine_1.jpg');
				background-size: cover;
				box-shadow: 1px 1px 1px rgb(228,108,31);
				color: rgb(247,183,112);
				text-shadow: 1px 1px 1px rgb(228,108,31);
			}
			
			.totalScore {
				background-color: rgb(235,235,235);
			}
			
			button {
				display: block;
				margin: 3rem auto;
			}
			
			#buttons_div {
				padding-top: 2rem;
				width: 100%;
			}
        </style>	
	
		
		
		<script>
			$(document).ready(function() {
				
			});
		</script>
		
    </head>
	
	
    <body>
		<h2>Турнирная таблица шахматного клуба</h2>
		
		
    </body>
	
</html>
