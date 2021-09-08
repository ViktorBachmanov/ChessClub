@props(['users'])

<div id='smart_table' style='position: relative; max-width: 100%; overflow: hidden;'>
		
	<div id='moving_frame' style='overflow: auto'>
	</div>
		
	<table>
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
