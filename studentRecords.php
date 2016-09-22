<?php
	$dbhost="127.0.0.1";
	$dbuser='root';
	$dbpass='password';
	$conn=mysql_connect($dbhost,$dbuser,$dbpass);
	//print_r($conn);
	if(!$conn)
	{
		echo "not conn";
		die("cannot connect to mysql".mysql_error());
	}
	
	mysql_select_db("RECORDS");
	echo "<html>
				<head>
				<style>
				//body{background-image:url(\"stack_of_books.jpg\");}
				body{background:#ccccff;}
				table, th, td {
					text-align:center;
				    border: 1px solid black;
				}</style>
				</head>
				<body>
				";
	function studentRecord()
	{
		$sql="SELECT * FROM STUDENTS;";
		$res=mysql_query($sql);
		echo "<div id=\"studentRecord\">";
		echo "<table>
			 	<tr>
			 	<th>studentID</th> <th>BOOK</th> <th>bookID</th>
			 	</tr>
		";
		while ($result=mysql_fetch_assoc($res)) {
			echo"
				<tr>
				<td>".$result['SID']."</td><td>".$result['BOOK_NAME']."</td>"."<td>".$result['BID']."</td>
				</tr>
				";
			}
			echo "</table>";
			echo "</div>";
		}
	studentRecord();
		echo "</body>
		  </html>";
		mysql_close($conn);
