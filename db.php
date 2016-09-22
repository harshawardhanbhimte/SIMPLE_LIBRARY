<?php
	$dbhost="127.0.0.1";
	$dbuser='root';
	$dbpass='harsh11';
	$conn=mysql_connect($dbhost,$dbuser,$dbpass);
	if(!$conn)
	{
	//	echo "not conn";
		die("cannot connect to mysql".mysql_error());
	}
	//echo "successfullyconnected";
	mysql_select_db("RECORDS");
	$sql="CREATE TABLE STUDENTS("."SID INT NOT NULL AUTO_INCREMENT,"."BOOK_NAME VARCHAR(100) NOT NULL,"."BID INT NOT NULL,"."PRIMARY KEY(SID));";
	mysql_query($sql);
	$sql="CREATE TABLE BOOKS("."BID INT NOT NULL AUTO_INCREMENT,"."BOOK_NAME VARCHAR(100) NOT NULL,"."INSTOCK BOOL NOT NULL DEFAULT FALSE,"."SID INT NOT NULL,"."PRIMARY KEY(BID));";
	mysql_query($sql);


?>