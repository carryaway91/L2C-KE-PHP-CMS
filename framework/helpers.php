<?php
	function db_connect() {
		 include dirname(__FILE__).'/../config/database.php';

		 
		$link = mysqli_connect( $database['host'], $database['user'], $database['pass'], $database['name'], $database['port']); 
		
		// odkazujem sa na asociativne pole v subore database.php, vytahujem len KEY
		return $link;
		// pripojime sa na databazu, vratime identifikator spojenia
	}

	function db_query($sql_string) {
		$link = db_connect();
		// $result = mysqli_query($link, $sql_string);
		// return $result !== false ? $result : mysqli_error($link);
		return mysqli_query($link, $sql_string);
		// odkazujeme sa na navratovu hodnotu z db_connect funkcie ($link) a potom ju pouzijem ako parameter pre mysqli_query, coho vysledok bude navratovy sql query
	}

 	function db_select($sql_string) { //vytiahnutie dat z dabazy - vracia nam POLE dat 
 		$result = db_query($sql_string);
 		// do resultu sa zapise navratova hodnota z funkcie db_query
 		$data = [];
 		
 		while ($object = mysqli_fetch_object($result)) { 
			$data[] = $object;
 			//array_push($data, $object);
		}
		return $data;
	 }
	 
    /*funkcia vrat jeden vysledok z databazy */
	 function db_single($sql_string) {
		 $result = db_query($sql_string);

		 return mysqli_fetch_object($result);
	 }
	 //******pomocne funkcie na komunikaciu s databazou (mysql) */
 ?>