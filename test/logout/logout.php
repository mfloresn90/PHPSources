<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<META HTTP-EQUIV=Refresh CONTENT="1; URL=../">
<title>Cerrando Sesion...</title>
</head>

<?php
session_start();
session_destroy();
session_unset();
?>

<body>
</body>
</html>