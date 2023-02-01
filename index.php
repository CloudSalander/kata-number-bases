<?php
#complete program

define('BINARY_BASE',2);
define('OCTAL_BASE',8);
define('DECIMAL_BASE',10);
define('HEXADECIMAL_BASE',16);
define('ACCEPTED_NUMERIC_BASES',[BINARY_BASE,OCTAL_BASE,DECIMAL_BASE,HEXADECIMAL_BASE]);

function checkNumber($number): bool {
	if(is_numeric($number)) return intval($number);
	else return false;
}

function checkNumericBase($number): bool {
	if(is_numeric($number) && in_array(intval($number), ACCEPTED_NUMERIC_BASES)) {
		return intval($number);
	}
	else return false;
}

function transformDecimalToHexadecimal(int $number):bool {
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

function transformToDecimal($number,$base) {
	
}

function printToOtherNumericBases($number) {
	$numeric_bases = [BINARY_BASE,OCTAL_BASE,DECIMAL_BASE,HEXADECIMAL_BASE];
	$string_number = "";
	foreach ($numeric_bases as $base) {
		echo $number." into base ".$base." is: ".strval(transformToBase($number,$base)).".\n";		
	}
}

#intval() y readline() son funciones de PHP
do {
	$number =  readline("Please,enter number:");
}while(!checkNumber($number));

do {
	$base = readline("Please, enter base(2,8,10 or 16)");
}while(!checkNumericBase($base));


#todo: base number selector and input checker
printToOtherNumericBases($number,$base);

