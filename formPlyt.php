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
	
	
	<!-- ==================================== srodek ===========================-->
	
      <?php

include 'polaczenie.php';
$pl = $_GET['pl'];
$idp=$_GET['idp'];
$op=$_GET['op'];
if(!$op){
echo "<h1>Dodawanie płyty do bazy</h1>";
}
$nosnik= "SELECT * FROM NOSNIKI order by NAZWA";
$query1 = mysql_query($nosnik);
$alb = "select * from ALBUMY order by TYTUL";
$query3 = mysql_query($alb);

$plyta = "SELECT * FROM PLYTY where ID=$idp";


if($op){

$query2= mysql_query($plyta);
$plyta = mysql_fetch_object($query2);

echo "<h1> Edycja płyty: <br><br><a href=\"plyty.php\">".$plyta->TYTUL."</a></h1>";

//////////////////////      $ID_n=$plyta->ID_NOSNIKI;
$ID_n=$plyta->ID_NOSNIKI;
$ID_a=$plyta->ID_ALBUMY;
}

echo "<h2><table><form name=\"OK\" method=\"post\" action=\"edit_addPlyt.php?op=$op&idp=$idp\">";

echo '<tr><td>Rodzaj nośnika: </td><td><select name="nosnik">';

//echo '<option value="0"></option>';
while ($nos = mysql_fetch_object($query1)){

if($ID_n==$nos->ID){
echo '<option selected value="'.$nos->ID.'">'.$nos->NAZWA."</option>\n";
}
else{
echo '<option value="'.$nos->ID.'">'.$nos->NAZWA."</option>\n";
}
}
///////////////////////////////////////////////////////////////////////////////
echo '<tr><td>Album: </td><td><select name="album">';

//echo '<option value="0"></option>';
while ($album = mysql_fetch_object($query3)){

if($ID_a==$album->ID){
echo '<option selected value="'.$album->ID.'">'.$album->TYTUL."</option>\n";
}
else{
echo '<option value="'.$album->ID.'">'.$album->TYTUL."</option>\n";
}
}

echo '<tr><td>Tytuł:</td> <td><input type="text" name="tytul" value="';
if($op){echo $plyta->TYTUL;}
echo '"></td></tr>';
echo '<tr><td>Notatka:</td> <td><input type="text" name="notatka" value="';
if($op){echo $plyta->NOTATKA;}
echo '"></td></tr>';


echo "<tr><td><input type=\"submit\" value=\"ZAPISZ\"></form><form method=\"post\" action=\"plyty.php?pl=$pl\"><input type=\"submit\" value=\"ANULUJ\"></td></tr>";

echo "</select></td></tr></form></table>";


/*



echo '</select></td></tr>';
echo '<tr><td>Jezyk:</td> <td>

<select name="jezyk">';
echo '<option value="0"></option>'."\n";
while ($jezyk = mysql_fetch_object($query2)){

if($ID_j==$jezyk->ID){
echo '<option selected value="'.$jezyk->ID.'">'.$jezyk->NAZWA.'</option>'."\n";
}
else{
echo '<option value="'.$jezyk->ID.'">'.$jezyk->NAZWA.'</option>'."\n";
}

}

echo '</select></td></tr>';

echo '<tr><td>Numer utworu:</td> <td><input type="text" name="nr_utworu" value="';
if($op){echo $nuta->NUMER;}
echo '"></td></tr>';

echo '<tr><td>Czas [min]:</td> <td><input type="text" name="czas_min" value="';
if($op){echo $nuta->CZAS_MIN;}
echo '"></td></tr>';

echo '<tr><td>Czas [sek]:</td> <td><input type="text" name="czas_sek" value="';
if($op){echo $nuta->CZAS_SEK;}
echo '"></td></tr>';

echo '<tr><td>Tekst:</td> <td><input type="text" name="tekst" value="';
if($op){echo $nuta->TEKST;}
echo '"></td></tr>';

echo '<tr><td>Notatka:</td> <td><input type="text" name="notatka" value="';
if($op){echo $nuta->NOTATKA;}
echo '"></td></tr>';




echo "<tr><td colspan=\"2\"><input type=\"submit\" value=\"ZAPISZ\"></form><form method=\"post\" action=\"spisU.php?idp=$idp\"><input type=\"submit\" value=\"ANULUJ\"></td></tr>";


echo '</table></h2>';




*/
mysql_free_result($query1);

if($op){
mysql_free_result($query2);
mysql_free_result($query3);
}
mysql_close($baza);
?>



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
