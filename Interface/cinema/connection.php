<?php 

	function DBConnect(){
		$sql = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die (mysql_error());

		mysqli_set_charset($sql, CHARSET) or die (mysql_error($sql));
		return $sql;
	}

	function DBClose($sql){
		@mysql_close($sql) or die (mysql_error($sql));

	}
 ?>