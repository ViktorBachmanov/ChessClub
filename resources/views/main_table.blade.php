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
				background-color: gray;
			}
        </style>
    </head>
	
	
    <body>
		
	
		<table>
			<thead>
				<tr>
					<th>№
					<th>ФИО
					@foreach($users as $user)
						<th>{{ $loop->iteration }}
					@endforeach
					<th>Рейтинг
				</tr>
			</thead>
			
			<tbody>
				@foreach($users as $user)
					<tr>
						<th>{{ $loop->iteration }}</th>
						<td class='fio'>{{ $user->name; }}</td>
						@foreach($users as $opponent)
							<td 
								@if($loop->iteration == $loop->parent->iteration)
									class='self'
								@endif
							>
								
							</td>
						@endforeach
						<td>{{ $user->rating; }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
    </body>
	
</html>
