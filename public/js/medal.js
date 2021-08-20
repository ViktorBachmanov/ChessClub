function drawMedal(cell, color, count = 0, angle = 0) {
	//let cell = document.getElementById(cellId);
	
	let layer = document.createElement('div');
	layer.style.position = 'absolute';
	layer.style.top = 0;
	layer.style.left = 0;
	layer.style.width = '100%';
	layer.style.height = '100%';
	layer.style.background = `linear-gradient(${angle}deg, #faecbb9b 0%,
															 #f2ce493d 25%,
															#fff0 50%,
															#f2ce493d 75%,
															 #faecbb9b 100%)`;
										
	cell.append(layer);
	
	if(count++ > 7)
		return;
		
	drawMedal(cell, color, count, angle + 22.5);
}