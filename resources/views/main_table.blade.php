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
				min-width: 39px;
				max-width: 39px;
				padding: 0;				
				position: relative;
				
				
				background: linear-gradient(170deg, rgb(245,245,245) 0%,
													rgb(225,235,235) 50%,
													rgb(175,195,220) 100%);
			}
			
			.medal {
				width: 100%;
				vertical-align: middle;
			}
			
			.med {
				width: 2rem;
				height: 2rem;
				vertical-align: middle;
				border-radius: 1rem;
				box-shadow: 1px 1px 1px rgb(255,180,68);
				margin: auto auto;
				background: linear-gradient(170deg, rgb(252, 220, 107) 0%,
													
													rgb( 255, 254, 182) 100%);
													
				font-family: 'GFS Didot', serif;
				/*color: rgb(234,158,46);*/
				color: rgb(255, 254, 182);
				display: flex;
				align-items: center;
				justify-content: center;
				text-shadow: 1px 1px 1px rgb(255,180,68);
				/*border: 1px dotted rgb(234,158,46);*/
				
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
										 echo '<div class="med">I</>';
										 
										 break;
										
										case 2:
										 echo "<img src='pics/chess_silver_t.png' class='medal'>";
										 break;
										 
										case 3:
										 echo "<img src='pics/bronze_3_t.png' class='medal'>";
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
