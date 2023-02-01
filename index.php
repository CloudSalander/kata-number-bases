<?php
#complete program

define('BINARY_BASE',2);
define('OCTAL_BASE',8);
define('DECIMAL_BASE',10);
define('HEXADECIMAL_BASE',16);
define('ACCEPTED_NUMERIC_BASES',[BINARY_BASE,OCTAL_BASE,DECIMAL_BASE,HEXADECIMAL_BASE]);
define("HEXADECIMAL_CHARS",["0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F"]);


function isHexadecimalNumber(string $number): bool {
	$number_chars = str_split($number);
	foreach($number_chars as $char) {
		if(!in_array($char,HEXADECIMAL_CHARS)) return false;
	}
	return true;
} 

function checkNumber($number): bool {
	if(is_numeric($number) || isHexadecimalNumber($number)) return $number;
	else return false;
}

function checkNumericBase(string $number): bool {
	if(is_numeric($number) && in_array(intval($number), ACCEPTED_NUMERIC_BASES)) {
		return intval($number);
	}
	else return false;
}

function transformDecimalToHexadecimal(int $number):string {
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


function isHexadecimalChar(int $base,int $number): string {
	return $base == HEXADECIMAL_BASE && $number > 9; 	
}
function transformToBase(int $number,int $base): string {
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

function transformToDecimal(int $number,int $base): int {
	$con = 0;
	$decimal_number = 0;
	do {
		$current_number = $number%$base;
		$decimal_number += $current_number * ($base ** $con);
		$number = intdiv($number,10); 
	}while($number/10 > 0);
}

function printToOtherNumericBases(int $number): void {
	$string_number = "";
	foreach (ACCEPTED_NUMERIC_BASES as $base) {
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


printToOtherNumericBases($number,$base);

