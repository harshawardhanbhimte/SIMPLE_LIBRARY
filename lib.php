<?php
	$dbhost="127.0.0.1";
	$dbuser='root';
	$dbpass='dbpass';
	$conn=mysql_connect($dbhost,$dbuser,$dbpass);
	//print_r($conn);
	if(!$conn)
	{
		echo "not conn";
		die("cannot connect to mysql".mysql_error());
	}
	
	mysql_select_db("RECORDS");
	function addentries()
		{
			$n=10;
			for ($i=2; $i <$n ; $i++) { 

				//$bookend=settype($i, "string");
				//echo $bookend;
				$bookend=$i;
				$bookend="$bookend";
				//echo gettype($i);
				//$i=2;
				//$sql="INSET INTO BOOKS(BOOK_NAME,SID) VALUES(book2,".$i.");";
				$str="book".$bookend;

				//$sql="INSERT INTO BOOKS (BOOK_NAME,SID) VALUES("."\"book\""."$bookend".",".$i.");";
				$sql="INSERT INTO BOOKS (BOOK_NAME,SID) VALUES("."\"$str\"".",".$i.");";
				//$sql="SELECT * FROM BOOKS;";
				echo $sql;
				$res=mysql_query($sql);
				print_r(mysql_fetch_assoc($res));
				//print_r($res);

			}
		}	

	function findbook($enumber,$book,$book_name,$username)
	{
		$sql="SELECT INSTOCK FROM BOOKS"." WHERE BID=".$book;
		//echo $sql;
		$result= mysql_query($sql);
		$res=mysql_fetch_assoc($result);
		//echo empty($res);	
		if (empty($res)) {
			//empty table or book doesnt exist in that case enter the book.
			die("your book is not present please check the book id");
		}
		if ($res['INSTOCK']==true) {
				

				echo "your book has been reserverd!!!";

				$sql="UPDATE BOOKS SET INSTOCK=FALSE WHERE BID=".$book;
				//echo $sql;

				mysql_query($sql);

				//$sql="UPDATE STUDENTS SET BID=".$book." WHERE SID=".$enumber;
				$sql="SELECT BID FROM STUDENTS WHERE SID=".$enumber.";";
				$res=mysql_query($sql);
				$result=mysql_fetch_assoc($res);
				//echo empty($result);
				if(empty($result))
				{
					//echo "empty";
					$sql="INSERT INTO STUDENTS (SID,BOOK_NAME,BID) VALUES(".$enumber.","."\"$book_name\"".",".$book.");";
					//echo $sql;
					$res=mysql_query($sql);
				//echo $sql;
				}
				else
				{
					//echo "else";
					$sql="UPDATE STUDENTS SET BOOK_NAME="."\"$book_name\"".",BID=".$book." WHERE SID=".$enumber;
					//echo $sql;
					$res=mysql_query($sql);
					
					//$result=mysql_fetch_assoc($res);
				}
				
		}
		else {
			die("your book is out of stock!!");
		}

	}
	if (isset($_POST['enumber'])&&isset($_POST['book'])) {
		$enumber=$_POST['enumber'];
		$book=$_POST['book'];
		$book_name=$_POST['book_name'];
		$username=$_POST['username'];
		findbook($enumber,$book,$book_name,$username);
		//addentries()
	}



		mysql_close($conn);
?>