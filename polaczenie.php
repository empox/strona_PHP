<?php
$host="localhost";
$user="root";
$pass="";
//$kodowanie = "utf-8";
//$baza = mysql_connect($host,$user,$pass);//,"$kodowanie"
//mysqli_select_db("u661792925_db281");

$polacz = @mysql_connect($host, $user, $pass);
$baza = @mysql_select_db(u661792925_db281,$polacz);

?>