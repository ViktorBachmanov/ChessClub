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
		
		<link rel="stylesheet" href="css/prism.css"  />
		
		
        <!-- Styles -->
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
				
            }
			
			body > div {
				display: flex;
				flex-wrap: wrap;
				justify-content: center;
			}
			
			h2 {
				margin: 1rem;
				padding-top: 1rem;
				display: block;
				text-align: center;
				font-size: 125%;
			}
			/*
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
			}*/
			
			section {
				/*text-indent: 1rem;*/
				/*box-shadow: 0 0 2px 2px gray;*/
				/*background-color: rgba(215, 224, 220, 0.22);*/
				border-radius: 1rem;
				margin: 1rem;
				padding: 1rem;
				max-width: 95%;
				box-sizing: border-box;
				
			}			
			
			section.auth {
				flex: 1 1 30%;
				min-width: 10rem;
				
				display: flex;
				flex-wrap: wrap;
				align-items: center;
				justify-content: center;
			}
			
			section.auth > div {
				flex: 1 1 50%;
				min-width: 7rem;
			}
			
			
			.cont {
				display: flex;
				
			}
			
			.screenshots {
				flex: 1 1 auto;
				
				display: flex;
				flex-direction: column;
				justify-content: space-between;
				
				height: 100%;
			}
			
			.screenshots p {
				
				max-width: 250px;					
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
				text-indent: 1rem;
			}
        </style>	
		
	
		<script src='js/SmartTable.js?6'></script>
		
		<script src="js/prism.js"></script>
		
		<script>
			$(document).ready(function() {
				const smartTable = new SmartTable;
				
				$('input[name="sorting"]').on('change', function() {
					document.forms[0].submit();
				});
			});
		</script>
		
    </head>
	
	
    <body>
		<h2><a href='/'>Сайт</a> шахматного клуба</h2>
		
		<div>
		
		
		<div style='flex: 0 1 auto; display: flex; flex-direction: column;  
					align-items: center; justify-content: center; max-width: 100%'>
			<div style='max-width: 100%; padding: 0 1rem 1rem'>
				<p>
				База результатов шахматных партий и рейтингов игроков. Итоговая турнирная таблица 
				сортируется по убыванию рейтинга. 
				
				<p>
				В случае, если таблица не умещается на экране - правая ее часть становится подвижной.
			</div>	
			
			<div style='max-width: 100%; margin: 1rem 0'>
				<x-smart-table :users=$users :days=$days :day=$day :sorting=$sorting/>
			</div>
		</div>	
		
		<div style='display: flex; flex-wrap: wrap; align-items: stretch; justify-content: center'>		
			<section>
				<div class='screenshots'>			
					<p style=''>
						Пользователи с правами 
						администратора могут добавлять новые партии в базу
					</p>
					<img src='pics/new.png' style=''>	
				</div>
			</section>
			
			<section>
				<div class='screenshots'>
					<p style=''>
						А также удалять последнюю (в случае
						какой-либо ошибки при добавлении)
					</p>	
					
					<img src='pics/del.png' style=''>				
				</div>
			</section>		
		</div>
		
		<section style='flex: 1 1 95%'>
			<div style='display: block'>
				<p>
				При добавлении партии в базу, автоматически вычисляется 
				 изменение рейтингов участников игры  
				 (по формуле Эло). 
				 <p>
				 При удалении партии производится 
				обратный пересчет рейтингов.
			</div>
			
			<pre style='overflow: auto; margin-top: 1rem'>
				<x-eval-rating/>
			</pre>
			
		</section>
		
		<section class='auth'>
			<div style='margin-bottom: 1rem'>
				<p>
				Простые игроки (не администраторы) не нуждаются в аутентификации. Режим администрирования 
				активируется кликом на фамилию в турнирной таблице.
				<p>
				 Система аутентификации построена на базе пакета Laravel/Fortify.
				</p>
			</div>
			
			<img src='pics/login.png'>
		</section>
		
		<section  class='auth'>
			<div>
				<p>
				В случае, если администратор забыл пароль, он имеет возможность
				получить по почте ссылку на задание нового пароля.
			</div>
			
			<img src='pics/sent.png' >
		</section>
		
		<section  class='auth'>
			<div>
				<p>
				 В MySQL-таблице <code>users</code> адреса электронной почты имеются только 
				у администраторов. 
			</div>
			
			<img src='pics/dontsent.png'>
		</section>
		
		
		
		
		
		
		
	</div>	
		
    </body>
	
</html>
