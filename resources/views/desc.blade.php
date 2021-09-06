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
				display: flex;
				flex-wrap: wrap;
				justify-content: center;
            }
			
			h2 {
				margin: 1rem;
			}
			
			.code {
				background-color: rgba(220,225,210,0.5);
				padding: 0.15rem;
				border-radius: 0.25rem;
				white-space: pre; 
				overflow: auto; 
				flex: 1 1 60%
			}
			
			section {
				text-indent: 1rem;
				box-shadow: 0 0 2px 2px gray;
				border-radius: 1rem;
				margin: 1rem;
				max-width: 100%;
				
				display: flex;
			}
			
			.cont {
				display: flex;
				
			}
			
			.screenshots {
				flex: 1 1 auto;
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: center;				
			}
			
			.screenshots img {
				margin: 1rem;
				max-width: 220px;
				border: 3px solid #686169;
				border-radius: 1rem;
				padding: 1rem 0.25rem 2rem 0.25rem;
				background-color: #686169;
			}
			
			a {
				text-decoration: underline;
			}
			
			p {
				margin-top: 1rem;
			}
        </style>	
	
		
		
		<script>
			$(document).ready(function() {
				
			});
		</script>
		
    </head>
	
	
    <body>
		<h2><a href='/'>Сайт</a> шахматного клуба</h2>	
		
		
		<section>
			База результатов шахматных партий и рейтингов игроков. Итоговая турнирная таблица 
			сортируется по убыванию рейтинга. 
			<img src='pics/table.png' style='max-width: 450px'>
		</section>	
		
		<section>
			<div class='screenshots'>
				Пользователи с правами 
				администратора могут добавлять новые партии в базу,&nbsp;
			
				<img src='pics/new.png'>
			</div>
		</section>
		
		<section>
			<div class='screenshots'>
				а также удалять последнюю (в случае
				какой-либо ошибки при добавлении)		
				
				<img src='pics/del.png'>
			</div>
		</section>
		
		<section>
			<div style='flex: 1 3 15%'>
			При добавлении партии в базу, 
			 изменение рейтингов участников игры автоматически вычисляется 
			 по формуле Эло. 
			 <p>
			 При удалении партии производится 
			обратный пересчет рейтингов.
			</div>
			<x-eval-rating>
			</x-eval-rating>
			
		</section>
		
		<section>
			Простые игроки (не администраторы) не нуждаются в аутентификации. Режим администрирования 
			активируется кликом на фамилию в таблице и вводом пароля.
			<img src='pics/login.png'>
		</section>
		
		<section>
			Система аутентификации построена на базе пакета Laravel/Fortify. Пользователь вводит 
			фамилию с инициалами и пароль. В MySQL-таблице <code>users</code> адреса электронной почты имеются только 
			у администраторов. 
			<img src='pics/dontsent.png'>
		</section>
		
		<section>
			В случае, если администратор забыл пароль, он имеет возможность
			получить по почте ссылку на задание нового пароля.
			<img src='pics/sent.png'>
		</section>
		
		
		
		
		
		
		
    </body>
	
</html>
