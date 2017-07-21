<?php
	function decrypt($string, $key) {
		$result = '';
		$string = base64_decode($string);
		for($i=0; $i<strlen($string); $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
		return $result;
	}
	
	$cadena_desencriptada = decrypt("urnIr9J3l4aV", "PcHcFeSaCv");

	echo $cadena_desencriptada;
?>