<?php
	require_once dirname(__FILE__).'/config/database.php';
	$schema_path = dirname(__FILE__).'/resources/database.sql';

	exec("mysql-u{$database['user']} -p{$database['pass']} -h{$database['host']} -D{$database['name']} < {$schema_path}");
	//exec - vykonanie prikazu shell
	
	//-u username ,,, -p password ..... -h host .... -D databaza ... < pridelenie databazy

	// *****prikazy na vykonanie importu databazy do suboru
?>