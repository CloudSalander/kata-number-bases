<?php
define('BINARY_BASE',2);
define('OCTAL_BASE',8);
define('HEXADECIMAL_BASE',16);

function decimalNumberToHexadecimalNumber($number) {
	switch($number) {
		case 10:
			return 'A';
		case 11:
			return 'B';
		case 12:
			return 'C';
		case 13:
			return 'D';
		case 14:
			return 'E';
		case 15:
			return 'F';
	}
}

function decimalToBinary($number) {
	$binary_string_number = "";
	while($number > BINARY_BASE-1) {
		$binary_string_number .= strval($number%BINARY_BASE);
		$number = intdiv($number,BINARY_BASE);
		
	}
	if($number > 0) $binary_string_number.= $number;
	return strrev($binary_string_number);
}

function decimalToOctal($number) {
	$octal_string_number = "";
	while($number > OCTAL_BASE-1) {
		$octal_string_number .= strval($number%OCTAL_BASE);
		$number = intdiv($number,OCTAL_BASE);		
	}
	if($number > 0) $octal_string_number.= $number;
	return strrev($octal_string_number);
}

function decimalToHexadecimal($number) {
	$hexadecimal_string_number = "";
	$hexadecimal_number = "";
	while($number > HEXADECIMAL_BASE-1) {
		$hexadecimal_number =  $number%HEXADECIMAL_BASE;
		if($hexadecimal_number > 9) {
			$hexadecimal_string_number .= decimalNumberToHexadecimalNumber($hexadecimal_number); 
		}
		else {
			$hexadecimal_string_number .= strval($number%HEXADECIMAL_BASE);	
		}
		$number = intdiv($number,HEXADECIMAL_BASE);	
	}
	if($number > 0 && $number > 9) $hexadecimal_string_number .= decimalNumberToHexadecimalNumber($number); 
	else if($number > 0 && $number <= 9) {
		$hexadecimal_string_number .= strval($number%HEXADECIMAL_BASE);	
	}
	return strrev($hexadecimal_string_number);
}


function binaryToDecimal($number) {

}

function octalToDecimal($number) {

}

function hexadecimalToDecimal($number) {

}


