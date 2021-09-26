import $ from 'jquery';


$('input:not([name="_token"]), select').attr('disabled', 'true');
					

document.querySelector(`input[type='radio'][value=${winner}]`).checked = true;