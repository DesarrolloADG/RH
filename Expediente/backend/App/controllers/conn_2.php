<?php

include '../../intranet/joomla-auth.php';
$dbhost1= 'localhost';
$dbuser1='root';
$dbpass1='sistemasadmonadg';

$conn1 = mysql_connect($dbhost1, $dbuser1, $dbpass1) or die                      ('Error connecting to mysql2');
$dbname1 = 'joomla';

mysql_select_db($dbname1,$conn1);

$dbhost = 'localhost';
$dbuser = 'sisvacaciones';
$dbpass = 'sisvacaciones';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die                      ('Error connecting to mysql');
$dbname = 'sisvacaciones';
mysql_select_db($dbname,$conn);


//$dbhost_1 = '192.168.1.40';
$dbhost_1 = '10.0.0.252';
$dbuser_1 = 'root';
$dbpass_1 = 'sistemasadmonadg';

/*$dbhost_1 = '10.0.0.253';
$dbuser_1 = 'root';
$dbpass_1 = 'hola123';*/

$conn_5 = mysql_connect($dbhost_1, $dbuser_1, $dbpass_1) or die                      ('Error connecting to mysql');
$dbname_5 = 'lupus';
mysql_select_db($dbname_5,$conn_5);


?>