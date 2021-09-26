function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1) + min); //The maximum is inclusive and the minimum is inclusive
}


export function selectRandomlyUserForColor(color) {
	let colorSelectEl = document.querySelector(`select[name="${color}"]`);
	let colorOptions = colorSelectEl.options;
	let randomId = getRandomIntInclusive(0, colorOptions.length - 1);
	colorOptions[randomId].selected = true;	
}


/*
function setBodyWidth(elWidth) {
	document.body.style.width = elWidth + 'px';
}

function setHeaderWidth(smartTable) {
	let headerEl = document.getElementById('header');
	headerEl.style.width = Math.min(smartTable.width, $(window).width()) + 'px';
}*/