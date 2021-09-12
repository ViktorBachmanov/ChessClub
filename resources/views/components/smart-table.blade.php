@props(['users', 'days', 'day', 'sorting'])

<form id='table_form' method='post' action='{{ url()->current() }}' style='margin: 1rem; text-align: center'>
	@csrf
	
	@php
		use App\Util\ConvertDate;		
	@endphp
	
	<label>Игровой день:&nbsp;
	<select name='day' onchange='document.forms[0].submit()'>
		<option value='all'>Все
		@foreach($days as $selectDay)			
			<option value='{{ $selectDay }}'>{{ (new ConvertDate($selectDay))->format() }}
		@endforeach
	</select>
	</label>
</form>

<script>
	document.querySelector('option[value="{{ $day }}"]').selected = true;
</script>

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
				<th class='totalScore' style='box-shadow: inset 0px 2px 2px gray;'>
					Очки
					<input type='radio' name='sorting' form='table_form' value='score'>
				</th>
				<th>Игры
				<th>
					Рейтинг
					<input type='radio' name='sorting' form='table_form' value='rating'>
				</th>
			</tr>
		</thead>
		
		<script>
			document.querySelector('input[value="{{ $sorting }}"]').checked = true;
			/*
			$('input[name="sorting"]').on('click', function() {
				//document.forms[0].submit();
				alert('sorting changed');
			});*/
			/*
			let radioArr = document.querySelectorAll('input[name="sorting"]');
			for(let i = 0; i < radioArr.length; i++) {
				radioArr[i].addEventListener('click', function() {
					alert('sorting changed');
				});
			}
			*/
		</script>
		
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
									 echo '<div class="crown"></>';
									 //echo '<img src="pics/crown3_t.png" style="width: 100%">';
									 
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
									$score = $user->evalScore($opponent->id, $day);
									$totalScore += $score;
								@endphp
								{{ $score; }}
							@endif
							
						</td>
					@endforeach
					<td class='totalScore'>{{ $user->evalTotalScore($day) }}
					<td>{{ $user->getTotalGames($day); }}
					<td>{{ $user->rating; }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
		
</div>