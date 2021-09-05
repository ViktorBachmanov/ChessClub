function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1) + min); //The maximum is inclusive and the minimum is inclusive
}


function selectRandomlyUserForColor(color) {
	let colorSelectEl = document.querySelector(`select[name="${color}"]`);
	let colorOptions = colorSelectEl.options;
	let randomId = getRandomIntInclusive(0, colorOptions.length - 1);
	colorOptions[randomId].selected = true;	
}

/*
function setHeaderWidth() {
	let headerEl = document.getElementById('header');
	let tableEl = document.querySelector('table');
	headerEl.style.width = tableEl.offsetWidth + 'px';
}*/

function setBodyWidth() {
	let tableEl = document.querySelector('table');
	document.body.style.width = tableEl.offsetWidth + 'px';
}