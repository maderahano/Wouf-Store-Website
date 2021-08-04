<?php
	$DB_HOST = "
	(DESCRIPTION = 
		(ADDRESS = (PROTOCOL = TCP)(HOST = LAPTOP-CB3AK5F5)(PORT = 1521))
		(CONNECT_DATA = 
			(SERVER = DEDICATED)
			(SERVICE_NAME = XE)
		)
	)";
	$DB_USER = 'rahano';
	$DB_PASS = 'rahano';
	$DB_OPT = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
	];
	
	try
	{
		$DB_con = new PDO("oci:dbname=".$DB_HOST,$DB_USER,$DB_PASS,$DB_OPT);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>	