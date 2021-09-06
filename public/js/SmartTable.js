class SmartTable {
	constructor() {
		this._frame = document.getElementById('smart_table');
		this._movingFrame = document.getElementById('moving_frame');
		
		this._fixedTable = this._frame.querySelector('table');
		this._movingTable = this._fixedTable.cloneNode(true);
		
		this._movingTable.style.position = 'relative';
		
		this._movingFrame.append(this._movingTable);
		
		
		this.setFixedTableBackgroundColor();
	}
	
	
	setFixedTableBackgroundColor() {
		//this._fixedTable.querySelectorAll('td');
		let rows = this._fixedTable.rows;
		for(let i = 0; i < rows.length; i++) {
			let row = rows[i];
			for(let j = 0; j < row.cells.length; j++) {
				if(j == 0 || j == 1) {
					row.cells[j].style.backgroundColor = 'white';
				}
				else {
					row.cells[j].style.visibility = 'hidden';
					row.cells[j].style.border = 'none';
				}
			}
		}
	}
	
	get width() {
		return this._frame.offsetWidth;
	}
	
}