<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta HTTP-EQUIV="refresh" Content="3; url=plyty.php">
  
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
$idp=$_GET['idp'];
$op=$_GET['op'];

$tytul = $_POST['tytul'];
$nosnik = $_POST['nosnik'];
$notatka = $_POST['notatka'];
$album = $_POST['album'];
/*

$gatunek = $_POST['gatunek'];
$nr_utworu = $_POST['nr_utworu'];
$tytul_utworu = $_POST['tytul_utworu'];
$czas_min = $_POST['czas_min'];
$czas_sek = $_POST['czas_sek'];
$tekst = $_POST['tekst'];


echo 'jezyk '.$jezyk;
echo '<br>gatunek '.$gatunek;
echo '<br>numer '.$nr_utworu;
echo '<br>tytul '.$tytul_utworu;
echo '<br>czas_min '.$czas_min;
echo '<br>czas_sek '.$czas_sek;
echo '<br>tekst '.$tekst;
echo '<br>notatka '.$notatka;
*/


if ($op){

//$up = "UPDATE UTWORY SET ID_GATUNKI=".$gatunek.",ID_JEZYKI=".$jezyk.",NUMER=".$nr_utworu.",TYTUL='".$tytul_utworu."',CZAS_MIN='".$czas_min."',CZAS_SEK='".$czas_sek."',TEKST='".$tekst."',NOTATKA='".$notatka."' WHERE ID=".$idu."";
$up = "UPDATE `PLYTY` SET `ID_NOSNIKI`=\"$nosnik\",`TYTUL`=\"$tytul\",`NOTATKA`=\"$notatka\" WHERE `ID`=\"$idp\"";
$query = mysql_query($up);


echo "<h1>Płyta została zmodyfikowana!</h1>";


}
else {
//$ins = "INSERT INTO UTWORY (ID,ID_Plyty,ID_Gatunki,ID_Jezyki,Numer,Tytul,Czas_min,Czas_sek,Tekst,Notatka) VALUES (GEN_ID(IDENT,1),".$idp.",".$gatunek.",".$jezyk.",'".$nr_utworu."','".$tytul_utworu."',".$czas_min.",".$czas_sek.",'".$tekst."','".$notatka."')";
$ins = "INSERT INTO `PLYTY` (`ID_NOSNIKI`,`ID_ALBUMY`,`TYTUL`,`NOTATKA`) VALUES (\"$nosnik\",\"$album\",\"$tytul\",\"$notatka\")";
$query = mysql_query($ins);
echo "<h1>Płyta została dodana!</h1>";
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
          <p>Copyright &copy; Wojciech Ceranka 2014; Projekt: Internetowe Interfejsy Systemółw Bazodanowych<!--link_baza_stop-->
    <div class="clear"></div>
  </div>

  <div class="clear"></div>
</div>

</div>
</body>
</html>
