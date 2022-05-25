<?php
	$host='localhost';
	$user='root';
	$pass='';
	$db='do_an_phim';
	//error_reporting(0);//Chan thong bao loi

	$link=mysqli_connect($host,$user,$pass,$db) or die("Connection error!");
	//Dong bo charset (collation)
	mysqli_query($link,"set names utf8");
?>
