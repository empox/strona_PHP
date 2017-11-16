<?php
session_start();
?>
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
     


	if ($_SESSION['log']){
	 echo '<ul class="menu">
        <li class="first selected"><a href="index.php">Strona główna</a></li>
        <li><a href="plyty.php">Płyty</a></li>
		<li><a href="albumy.php">Albumy</a></li>
        <li><a href="wykonawcy.php">Wykonawcy</a></li>
		<li><a href="zestawienia.php">Zestawienia</a></li>
		<li><a href="slowniki.php">Słowniki</a></li>
        <li><a href="szukaj.php">Szukaj</a></li>
        <li><a href="wyloguj.php">Wyloguj</a></li>
        <!--<li class="first"><a href="#">Bibendum quist</a></li>-->
      </ul>
      <div id="sidebar_dec"></div>
    <div class="clear"></div>
  </div>
  </div>';
  }
  else{
  echo '<ul class="menu">
        <li class="first selected"><a href="index.php">Strona główna</a></li>
        <li><a href="plyty.php">Płyty</a></li>
		<li><a href="albumy.php">Albumy</a></li>
        <li><a href="wykonawcy.php">Wykonawcy</a></li>
		<li><a href="zestawienia.php">Zestawienia</a></li>
        <li><a href="szukaj.php">Szukaj</a></li>
        <li><a href="login.php">Zaloguj</a></li>
        <!--<li class="first"><a href="#">Bibendum quist</a></li>-->
      </ul>
      <div id="sidebar_dec"></div>
    <div class="clear"></div>
  </div>
  </div>';
  }
  ?>
  
  
   <div class="content_spacer">
    <div class="section content">
	
	
	<!-- ==================================== zawartosc ===========================-->
<?php    

	include 'polaczenie.php';

//$select = 'SELECT * FROM Plyty';


$spis=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","R","S","T","U","W","X","Y","Z");
$licz=count($spis);
if ($_SESSION['log']){
echo "<h1>Albumy&nbsp&nbsp <a href=\"formAlb.php?op=0\"><img src=\"dodaj.png\" ></a></h1>";
}
else{
echo "<h1>Albumy&nbsp&nbsp </a></h1>";
}
echo '<br/>';

echo "<form method=\"post\" action=\"albumy.php\">";
echo "<input type=\"text\" name=\"nazwa\">";
echo "<input type=\"submit\" value=\"Szukaj\"><br/>";
echo "</form>";
echo "<br>";
//-----------------------------------------------------------------------------------

for($i=0;$i<=$licz-1;$i++){
		
	echo "<a href=\"albumy.php?pl=$spis[$i]\">".$spis[$i]." - </a>";

	}
	echo '';
$pl=$_GET['pl'];
echo "<a href=\"albumy.php?pl=9\">[0-9]</a>";
echo '</p><br/>';
if($pl==9){
	$select="SELECT ID,TYTUL FROM ALBUMY where WHERE  <'A'";
}
else{
	$select="SELECT ID,TYTUL FROM ALBUMY where TYTUL LIKE '$pl%'";
}


//--------------------------

$dana=$_POST['nazwa']; 
if (empty($_POST['nazwa'])){

}
else
{

$select="SELECT ID,TYTUL FROM ALBUMY where UPPER(TYTUL) LIKE UPPER('%$dana%')";
$query = mysql_query($select);

echo "<table>";
while ($wiersz = mysql_fetch_object($query)){
if ($_SESSION['log']){
echo "<tr><td><h4><a href=\"spisPA.php?idpa=$wiersz->ID&pl=$pl\">$wiersz->TYTUL</a></h4></td>  <td><h4><a href=\"usuwanieAlb.php?ida=$wiersz->ID&op=0\">&nbsp&nbsp<img src=\"usun2m.png\"></a></h4></td> <td><h4><a href=\"formAlb.php?ida=$wiersz->ID&op=1\">&nbsp&nbsp<img src=\"popraw.png\"></a></h4></td></tr>\n\r";
}
else{
echo "<tr><td><h4><a href=\"spisPA.php?idpa=$wiersz->ID&pl=$pl\">$wiersz->TYTUL</a></h4></td>  </tr>\n\r";

}
}
echo "</table>";
mysql_free_result($query);

}


//---------------------------------------------------------------------------------------------





if (empty($_GET['pl'])){
}
else {


//echo '<form name="plyta" action="tytulplyty2.php" method="get">';

echo "<table>";

$query = mysql_query($select);
while ($wiersz = mysql_fetch_object($query)){
if ($_SESSION['log']){
echo "<tr><td><h4><a href=\"spisPA.php?idpa=$wiersz->ID&pl=$pl\">".$wiersz->TYTUL."</a></h4></td>  <td><h4><a href=\"usuwanieAlb.php?ida=$wiersz->ID&op=0\">&nbsp&nbsp<img src=\"usun2m.png\"></a></h4></td> <td><h4><a href=\"formAlb.php?ida=$wiersz->ID&op=1\">&nbsp&nbsp<img src=\"popraw.png\"></a></h4></td></tr>\n\r";
}
else{
echo "<tr><td><h4><a href=\"spisPA.php?idpa=$wiersz->ID&pl=$pl\">".$wiersz->TYTUL."</a></h4></td>  </tr>\n\r";

}
}
echo "</table>";

//echo '<input type="submit" value="Pokaz zawartosc plyty">';
//echo '</form>';

mysql_free_result($query);
mysql_close($baza);
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
