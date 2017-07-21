<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_des = "localhost";
$database_des = "difusion_cultural";
$username_des = "root";
$password_des = "";
$des = mysql_pconnect($hostname_des, $username_des, $password_des) or trigger_error(mysql_error(),E_USER_ERROR); 
?>