<?php

namespace App\Util;

use DateTime;


class ConvertDate
{
	function __construct($date) {
		$this->date = new DateTime($date);
		
	}
	
	
	public function format() {
		return $this->date->format('d.m.y');
	}
	
}
	
