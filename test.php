<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
  
  <title>Płytoteka</title>

  <meta name="description" content="" />
  <meta name="keywords" content="" />


    
  <link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css" />
  <link rel="stylesheet" href="css/core.css" />
  <link rel="stylesheet" href="css/francja_elegancja.css" />

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.easing-1.3.pack.js"></script>
  <script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
  <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>

</head>
<body>
<?php
include 'polaczenie.php';



$select = "SELECT * FROM GATUNKI order by NAZWA";
$query = mysql_query($select);
while($wiersz = mysql_fetch_object($query))
{
echo $wiersz->NAZWA."<br>";
};

$selest = "SELECT COUNT(NAZWA) as cunt FROM GATUNKI";
$query=mysql_query($selest);
$wiersz = mysql_fetch_object($query);
echo "<br>";
echo $wiersz->cunt;
echo "<br>";

/*
$sel = "INSERT INTO `GATUNKI` (`NAZWA`) VALUES (\"GUNWO\")";
$query=mysql_query($sel);
echo "<br><br>";
*/

/*
$select = "SELECT * FROM GATUNKI";
$query = mysql_query($select);
while($wiersz = mysql_fetch_object($query))
{
echo $wiersz->NAZWA."<br>";
};
*/
echo "<br>";
echo "<form action=\"test.php\" method=\"post\">";
echo "JEbnij NAzWE::: <input type=\"text\" name=\"tes\">";
echo "<input type=\"submit\" value=\"NAKURWIAJ DALEJ\" name=\"testowa\">";
echo "</form><br>";


if(isset($_POST['tes'])){
$test=$_POST['tes'];
echo $test;
$ssss = "INSERT INTO `GATUNKI` (`NAZWA`) VALUES (\"$test\")";
$qqq=mysql_query($ssss);
echo "<br>";
}



$select = "SELECT * FROM GATUNKI order by NAZWA";
$query = mysql_query($select);
while($wiersz = mysql_fetch_object($query))
{
echo "<a href=\"test.php\">".$wiersz->NAZWA."</a><br>";
}





?>
</body>