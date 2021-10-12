class SmartTable {
	constructor() {
		this._frame = document.getElementById('smart_table');
		this._movingFrame = document.getElementById('moving_frame');
		
		this._fixedTable = this._frame.querySelector('table');
		this._movingTable = this._fixedTable.cloneNode(true);
		
		this.setFixedTableStyle();
		
		this._movingTable.style.position = 'relative';
		
		this._movingFrame.append(this._movingTable);
		
		
		this.setFixedTableBackgroundColor();
		
		this.setMovingTableShadow();
	}
	
	
	setFixedTableStyle() {
		this._fixedTable.style.position = 'absolute';
		this._fixedTable.style.top = 0;
		this._fixedTable.style.left = 0;
		this._fixedTable.style.backgroundColor = 'transparent';
		this._fixedTable.style.pointerEvents = 'none';
	}
	
	
	setFixedTableBackgroundColor() {
		let rows = this._fixedTable.rows;
		for(let i = 0; i < rows.length; i++) {
			let row = rows[i];
			for(let j = 0; j < row.cells.length; j++) {
				if(j == 0 || j == 1) {
					row.cells[j].style.backgroundColor = 'white';
					row.cells[j].style.boxShadow = '2px 2px 2px gray';
					row.cells[j].style.pointerEvents = 'auto';
				}
				else {
					row.cells[j].style.visibility = 'hidden';
					row.cells[j].style.border = 'none';
				}
			}
		}
	}
	
	
	setMovingTableShadow() {
		this._movingTable.rows[0].style.boxShadow = 'inset 0 2px 2px gray';		
	}
	
	get width() {
		return this._frame.offsetWidth;
	}
	
}



(function() {
	$('td:contains(Бачманов), td:contains(Петрухин)')
				.on('click', function() {
					location.href = '/login';
				})
				.css('cursor', 'pointer');
				
				
	new SmartTable;

	$('input[name="sorting"]').on('change', function () {
		document.forms[0].submit();
	});
})();