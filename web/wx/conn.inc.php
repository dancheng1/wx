<?php
	$dbname = 'pqYfKCBHnqzToWyFgGrp';
	$host = getenv('HTTP_BAE_ENV_ADDR_SQL_IP');
	$port = getenv('HTTP_BAE_ENV_ADDR_SQL_PORT');
	$user = 'c8a2ebc5cf234dc9ae881e103084243b';
	$pwd = '4457528c6e894d2c9faf05f095ca092e';

	$link = mysql_connect("{$host}:{$port}", $user, $pwd, true);
	mysql_set_charset("utf8");
	mysql_select_db($dbname);
?>