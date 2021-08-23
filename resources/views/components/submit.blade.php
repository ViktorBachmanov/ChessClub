@props(['action'])

<button type='submit' formaction='/{{ $action }}'>
	@switch($action)
		@case('store')
			Добавить партию в базу
			@break
			
		@case('destroy')
			Удалить партию из базы
			@break
	@endswitch
	
</button>