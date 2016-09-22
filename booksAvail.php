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
	function booksaAvail()
		{
			$sql="SELECT * FROM BOOKS;";
			$res=mysql_query($sql);
			//$result=mysql_fetch_assoc($res);
			//print_r($result);
			echo "<div id=\"book_record\">";
			echo"<table>
					<tr>
					<th>bookID</th><th>BOOK</th><th>INSTOCK</th><th>studentID</th>
					</tr>";
			while ($result=mysql_fetch_assoc($res)) {
				$str="YES";
				if (!$result['INSTOCK']) {
					$str="NO";
				}
				$sid=$result['SID'];
				if ($sid==0) {
					$sid="--";
				}
				echo"
				<tr>
						<td>".$result['BID']."</td><td>".$result['BOOK_NAME']."</td><td>".$str."</td><td>".$sid."</td>
				</tr>
				
				";
			}
			echo "</table>";
			echo "</div>";
		}	
		booksaAvail();
		echo "</body>
		  </html>";
		mysql_close($conn);
