<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chess</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

		<link rel="Stylesheet" href="css/base.css">
		
        <!-- Styles -->
        <style>
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
			
			.fio {
				text-align: left;
			}
			
			.self {
				background: linear-gradient(170deg, rgb(245,245,245) 0%,
													rgb(225,225,225) 50%,
													rgb(150,150,185) 100%);
			}
        </style>
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
					<th>Очки
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
									class='self'
								@endif
							>
								@if($loop->iteration != $loop->parent->iteration)
									@php
										$score = Game::evalScoreUser1User2($user->id, $opponent->id);
										$totalScore += $score;
									@endphp
									{{ $score; }}
								@endif
								
							</td>
						@endforeach
						<td>{{ $totalScore; }}
						<td>{{ $user->rating; }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
    </body>
	
</html>
