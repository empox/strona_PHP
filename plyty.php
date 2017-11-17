<?php
session_start();
?>
<!DOCTYPE HTML>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
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
<div class="external" id="top">

<div class="header">
  <div id="header_dec_1"></div>
  <h1 class="logo"><a href="./"><span id="title">Płytoteka</span><span id="subtitle">Twoja muzyka jest tutaj</span></a></h1>
  <div id="header_dec_2"></div>
</div>
<div class="main">
  <div class="sidebar_spacer">
  <div class="section sidebar">
   
   <?php
    include 'menu.php';
  ?>
  
  
   <div class="content_spacer">
    <div class="section content">
	
	
	<!-- ==================================== zawartosc ===========================-->
<?php    

	include 'polaczenie.php';

//$select = 'SELECT * FROM Plyty';

$spis=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","R","S","T","U","W","X","Y","Z");
$licz=count($spis);

if (isset($_SESSION['log'])){
echo "<h1>Płytoteka&nbsp&nbsp <a href=\"formPlyt.php?op=0\"><img src=\"dodaj.png\" ></a></h1>";
}
else{
echo "<h1>Płytoteka&nbsp&nbsp</h1>";
}
echo '<br/>';

echo "<form method=\"post\" action=\"plyty.php\">";
echo "<input type=\"text\" name=\"nazwa\">";
echo "<input type=\"submit\" value=\"Szukaj\"><br/>";
echo "</form>";
//-----------------------------------------------------------------------------------


echo'<br><p>';

for($i=0;$i<=$licz-1;$i++){
		
	echo "<a href=\"plyty.php?pl=$spis[$i]\">".$spis[$i]." - </a>";

	}
	echo '';
	
$pl=isset($_GET['pl']);
echo "<a href=\"plyty.php?pl=9\">[0-9]</a>";
echo '</p><br/>';
if($pl==9){
	$select="SELECT ID,TYTUL FROM PLYTY where TYTUL  <'A'";
}
else{
	$select="SELECT ID,TYTUL FROM PLYTY where TYTUL LIKE '$pl%'";
}
echo '<br/>';




$dana=isset($_POST['nazwa']); 
if (empty($_POST['nazwa'])){

}
else
{

$select="SELECT ID,TYTUL FROM PLYTY where UPPER(TYTUL) LIKE UPPER('%$dana%')";
$query = mysql_query($select);
echo "<table>";
while ($wiersz = mysql_fetch_object($query)){
if ($_SESSION['log']){
echo "<tr><td><h4><a href=\"spisU.php?idp=".$wiersz->ID, "\"> ".$wiersz->TYTUL."</a></h4></td>  <td><h4><a href=\"usuwaniePlyt.php?idp=$wiersz->ID&op=0\">&nbsp&nbsp<img src=\"usun2m.png\"></a></h4></td> <td><h4><a href=\"formPlyt.php?idp=$wiersz->ID&op=1\">&nbsp&nbsp<img src=\"popraw.png\"></a></h4></td></tr>";
}
else{
echo "<tr><td><h4><a href=\"spisU.php?idp=".$wiersz->ID, "\"> ".$wiersz->TYTUL."</a></h4></td></tr>";
}
}
echo "</table>";
mysql_free_result($query);
mysql_close($baza);
}




//---------------------------------------------------------------------------------------------





if (empty($_GET['pl'])){
}
else {


//echo '<form name="plyta" action="tytulplyty2.php" method="get">';

echo "<table>";

$query = mysql_query($select);
while ($wiersz = mysql_fetch_object($query)){
if (isset($_SESSION['log'])){
echo "<tr><td><h4><a href=\"spisU.php?idp=".$wiersz->ID, "\"> ".$wiersz->TYTUL."</a></h4>  <td><h4><a href=\"usuwaniePlyt.php?idp=$wiersz->ID&op=0\">&nbsp&nbsp<img src=\"usun2m.png\"></a></h4></td> <td><h4><a href=\"formPlyt.php?idp=$wiersz->ID&op=1\">&nbsp&nbsp<img src=\"popraw.png\"></a></h4></td></tr>\n\r";
}
else{
echo "<tr><td><h4><a href=\"spisU.php?idp=".$wiersz->ID, "\"> ".$wiersz->TYTUL."</a></h4></tr>\n\r";
}


// <td><h6>'.'<a href="usun.php?idu='.$wiersz->ID.'">&nbsp&nbsp<img src="usun2m.png"></a>'.'</h6></td><td><h6>'.'<a href="form.php?idu='.$wiersz->ID.'&op=1&idp='.$idp.'">&nbsp&nbsp<img src="popraw.png"></a>'.'</h6></td></tr>';
}
echo "</table>";

//echo '<input type="submit" value="Pokaz zawartosc plyty">';
//echo '</form>';

mysql_free_result($query);
mysql_close($polacz);
//mysql_close($baza);
}




?>

  
  
  
  <!--====================================koiniec zawartosci ====================== -->
	
      <div class="clear"></div>
      
	  
	  
	  
</div>
<div class="clear"></div>
</div>      
      
      
    </div>
  </div>
 
  <div class="clear"></div>
</div>

<div class="section footer">

 <!-- <ul class="menu">
    <li><a href="#">Lore ipsum dolor</a></li>
    <li><a href="#">Met consectetur</a></li>
    <li><a href="#">Adipiscing elit</a></li>
    <li><a href="#">Pellentesque posuere</a></li>
    <li><a href="#">Magna a tupis</a></li>
    <li><a href="#">Magna a tupis</a></li>
    <li><a href="#">Lore ipsum</a></li>
    <li><a href="#">Lore ipsum</a></li>
    <li class="last"><a href="#">Bibendum quist</a></li>
  </ul>-->

  <div class="module strona">
          <p>Copyright &copy; Wojciech Ceranka 2014; Projekt: Internetowe Interfejsy Systemów Bazodanowych<!--link_baza_stop-->
    <div class="clear"></div>
  </div>

  <div class="clear"></div>
</div>

</div>
</body>
</html>
