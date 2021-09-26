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
		
			
		<link rel="Stylesheet" href="css/base.css?13">
		<link rel="Stylesheet" href="css/main_table.css?1">
		
		
        <!-- Styles -->
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
				
            }
			
			
			
			
			/*
			.sorting::after {
				content: '\25BC';
				color: #848579;
			}*/
        </style>
		
    </head>
	
	
    <body style='text-align: center;'>
	
		<div style='display: inline-block; margin: 0 auto; max-width: 100%'>
		
		<x-header :isTable='true'/>
		
		
		<x-smart-table :users=$users :days=$days :day=$day :sorting=$sorting/>		
		
		
		</div>
    </body>

	<script src='js/SmartTableBabel.js?7'></script>
	
</html>
