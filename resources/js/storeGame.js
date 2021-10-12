import { selectRandomlyUserForColor } from './util.js';


selectRandomlyUserForColor('white');			
selectRandomlyUserForColor('black');

let form = document.forms[0];
form.onsubmit = () => {
	if (form.white.value == form.black.value) {
		form.white.classList.add('self');
		form.black.classList.add('self');
		return false;
	}
	return true;
};

$('select').on('click', function () {
	$('select').removeClass('self');
});