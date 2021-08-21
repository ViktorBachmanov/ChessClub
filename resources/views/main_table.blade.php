<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chess</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=GFS+Didot&display=swap" rel="stylesheet">
		
		<link rel="Stylesheet" href="css/base.css">
		
		<script src='js/medal.js'></script>
		
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
				
				
				background: linear-gradient(170deg, rgb(245,245,245) 0%,
													rgb(225,235,235) 50%,
													rgb(175,195,220) 100%);
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
													rgb(250,240,230) 100%);
				box-shadow: 1px 1px 1px rgb(220,220,220);
				color: rgb(250,240,230);
				text-shadow: 1px 1px 1px rgb(220,220,220);
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
        </style>
		
		<script>
			window.onload = function() {
				/*let cell = document.getElementById('gold');
				drawMedal(cell, 'color');*/
			};
		</script>
		
    </head>
	
	
    <body>
		@php
			use App\Models\Game;
		@endphp
	
		<table>
			<thead>
				<tr>
					<th>№
					<th>ФИО
					@foreach($users as $user)
						<th>{{ $loop->iteration }}
					@endforeach
					<th class='totalScore'>Очки
					<th>Рейтинг
				</tr>
			</thead>
			
			<tbody>
				@foreach($users as $user)
					@php
						$totalScore = 0;
					@endphp
					<tr>
						<th>{{ $loop->iteration }}</th>
						<td class='fio'>{{ $user->name; }}</td>
						@foreach($users as $opponent)
							<td 
								@if($loop->iteration == $loop->parent->iteration)
									class='self' id='gold'
								@endif
							>
								@if($loop->iteration == $loop->parent->iteration)
									@php
									switch($loop->iteration) {
										case 1:
										 //echo "<img src='pics/chess_gold_t.png' class='medal'>";
										 echo '<div class="medal gold">I</>';
										 
										 break;
										
										case 2:
										 //echo "<img src='pics/chess_silver_t.png' class='medal'>";
										 echo '<div class="medal silver">II</>';
										 break;
										 
										case 3:
										 //echo "<img src='pics/bronze_3_t.png' class='medal'>";
										 echo '<div class="medal bronze">III</>';
										 break;	

										case 4:
										 echo '<div class="medal wood">IV</>';
										 break;	
									}
									@endphp
								@else
									@php
										$score = Game::evalScoreUser1User2($user->id, $opponent->id);
										$totalScore += $score;
									@endphp
									{{ $score; }}
								@endif
								
							</td>
						@endforeach
						<td class='totalScore'>{{ $totalScore; }}
						<td>{{ $user->rating; }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
    </body>
	
</html>
