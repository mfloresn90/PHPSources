<?php
	function encrypt($string, $key) {
		$result1 = '';
		for($i=0; $i<strlen($string); $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)+ord($keychar));
			$result1.=$char;
		}
		return base64_encode($result1);
	}
?>