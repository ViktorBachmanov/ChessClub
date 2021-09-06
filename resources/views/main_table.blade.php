<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chess</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=GFS+Didot&display=swap" rel="stylesheet">
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<script src='js/util.js?2'></script>
		<script src='js/SmartTable.js?4'></script>
	
		<link rel="Stylesheet" href="css/base.css?11">
		
		
        <!-- Styles -->
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
				display: flex;
				flex-direction: column;
				align-items: center;
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
			
			
			/*
			.sorting::after {
				content: '\25BC';
				color: #848579;
			}*/
        </style>
		

		
	
		
		
		<script>
			$(document).ready(function() {
				@if(Auth::check())
					/*let tableEl = document.querySelector('table');
					document.querySelector('#buttons_div').style.width = 
								tableEl.offsetWidth + 'px';*/
				@endif
				
				$('td:contains(Бачманов), td:contains(Петрухин)')
				.on('click', function() {
					location.href = '/login';
				})
				.css('cursor', 'pointer');
				
				//setBodyWidth();
				
				const smartTable = new SmartTable;
				
				setHeaderWidth(smartTable);
				
				$(window).on('resize', () => {
					setHeaderWidth(smartTable);
				});
				
			});
			
			
		</script>
		
    </head>
	
	
    <body>
		
		<x-header :isTable='true'/>
		
		<div id='smart_table' style='position: relative; max-width: 100%; overflow: hidden;'>
		
			<div id='moving_frame' style='overflow: auto'></div>
			
		<table style='position: absolute; top: 0; left: 0; background-color: transparent; 
					pointer-events: none; '>
			<thead>
				<tr>
					<th>№
					<th>ФИО
					@foreach($users as $user)
						<th>{{ $loop->iteration }}
					@endforeach
					<th class='totalScore' style='box-shadow: inset 0px 2px 2px gray;'>Очки
					<th>Игры
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
								@class(['self' => $loop->iteration == $loop->parent->iteration])
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
										$score = $user->evalScore($opponent->id);
										$totalScore += $score;
									@endphp
									{{ $score; }}
								@endif
								
							</td>
						@endforeach
						<td class='totalScore'>{{ $totalScore; }}
						<td>{{ $user->getTotalGames(); }}
						<td>{{ $user->rating; }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		</div>
		
		
    </body>
	
</html>
