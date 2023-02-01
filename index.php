<?php
define('BINARY_BASE',2);
define('OCTAL_BASE',8);
define('HEXADECIMAL_BASE',16);

function transformDecimalToHexadecimal($number) {
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

function isHexadecimalChar($base,$number) {
	return $base == HEXADECIMAL_BASE && $number > 9; 	
}
function transformToBase($number,$base) {
	$string_number = "";
	do {
		$number_to_add = $number%$base;
		if(isHexadecimalChar($base,$number_to_add)) {
			$number_to_add = transformDecimalToHexadecimal($number_to_add);
		} 
		else strval($number_to_add);
		$string_number .= $number_to_add;
		$number = intdiv($number,$base);
	}while($number > 0);
	return strrev($string_number);
}

function printToOtherNumericBases($number) {
	$numeric_bases = [BINARY_BASE,OCTAL_BASE,HEXADECIMAL_BASE];
	$string_number = "";
	foreach ($numeric_bases as $base) {
		echo $number." into base ".$base." is: ".strval(transformToBase($number,$base)).".\n";		
	}
}

#intval() y readline() son funciones 
$number =  intval(readline("Please,enter base 10 number:"));
#todo: base number selector and input checker
printToOtherNumericBases($number);

