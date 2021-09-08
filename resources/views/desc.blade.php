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
	
		<link rel="Stylesheet" href="css/base.css?13">
		<link rel="Stylesheet" href="css/main_table.css">
		
		
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
				display: block;
				text-align: center;
			}
			
			code {
				background-color: rgba(220,225,210,0.5);
				padding: 0.25rem;
				border-radius: 0.2rem;
			}
			
			.code {
				background-color: rgba(220,225,210,0.5);
				padding: 0.15rem;
				border-radius: 0.25rem;
				white-space: pre; 
				overflow: auto; 
				float: right;
			}
			
			section {
				text-indent: 1rem;
				/*box-shadow: 0 0 2px 2px gray;*/
				background-color: rgba(215, 224, 220, 0.22);
				border-radius: 1rem;
				margin: 1rem;
				padding: 1rem;
				max-width: 100%;
				
				/*display: flex;
				justify-content: center;*/
			}
			
			.cont {
				display: flex;
				
			}
			
			.screenshots {
				flex: 1 1 auto;
									
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
		
	
		<script src='js/SmartTable.js?6'></script>
		
		<script>
			$(document).ready(function() {
				const smartTable = new SmartTable;
			});
		</script>
		
    </head>
	
	
    <body>
		<h2><a href='/'>Сайт</a> шахматного клуба</h2>	
		
		
		<section>
			<x-smart-table :users=$users/>
			<p>
			База результатов шахматных партий и рейтингов игроков. Итоговая турнирная таблица 
			сортируется по убыванию рейтинга. 
			
			<p>
			В случае, если таблица не умещается на экране - правая ее часть становится подвижной.
			
		</section>	
		
		<section>
			<div class='screenshots'>
			<img src='pics/new.png' style='float: left'>
			<p style='max-width: 10rem; display: inline-block'>
				Пользователи с правами 
				администратора могут добавлять новые партии в базу&nbsp;
			
				
			</div>
		</section>
		
		<section>
			<div class='screenshots'>
			<img src='pics/del.png' style='float: right'>
			<p style='max-width: 10rem; display: inline-block'>
				А также удалять последнюю (в случае
				какой-либо ошибки при добавлении)		
				
				
			</div>
		</section>
		
		<section>
			<div style='max-width: 10rem; display: inline-block'>
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
			активируется кликом на фамилию в турнирной таблице.
			 Система аутентификации построена на базе пакета Laravel/Fortify. Пользователь вводит 
			фамилию с инициалами и пароль.
			<img src='pics/login.png'>
		</section>
		
		<section>
			В случае, если администратор забыл пароль, он имеет возможность
			получить по почте ссылку на задание нового пароля.
			<img src='pics/sent.png'>
		</section>
		
		<section>
			 В MySQL-таблице <code>users</code> адреса электронной почты имеются только 
			у администраторов. 
			<img src='pics/dontsent.png'>
		</section>
		
		
		
		
		
		
		
		
		
    </body>
	
</html>
