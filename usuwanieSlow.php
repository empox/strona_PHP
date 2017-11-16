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



$id=$_GET['ID'];
$l=$_GET['l'];
$G=$_GET['G'];
if ($G=="g")
{
$select=  "SELECT * FROM Gatunki where id=$id";
$query=mysql_query($baza,$select);
$wiersz = mysql_fetch_object($query);

	echo '<h1> Czy napewno chcesz usunąć gatunek: <br><br>'. $wiersz->NAZWA.'?</h1>';
	echo "<h1><a href=\"usunS.php?id=$wiersz->ID&pl=$l&zmienna=g\">TAK</a>&nbsp&nbsp<a href=\"slowniki_1.php?pl=$l&zmienna=g\">NIE</a></h1>";
	

	}

if ($G=="n")
{
$select=  "SELECT * FROM NOSNIKI where id=$id";
$query=mysql_query($baza,$select);
$wiersz = mysql_fetch_object($query);

	echo '<h1> Czy napewno chcesz usunąć nośnik: <br><br>'. $wiersz->NAZWA.'?</h1>';
	echo "<h1><a href=\"usunS.php?id=$wiersz->ID&pl=$l&zmienna=n\">TAK</a>&nbsp&nbsp<a href=\"slowniki_1.php?pl=$l&zmienna=n\">NIE</a></h1>";

}
if ($G=="w")
{
$select=  "SELECT * FROM WYDAWCY where id=$id";
$query=mysql_query($baza,$select);
$wiersz = mysql_fetch_object($query);



	echo '<h1> Czy napewno chcesz usunąć wydawcę: <br><br>'. $wiersz->NAZWA.'?</h1>';
	echo "<h1><a href=\"usunS.php?id=$wiersz->ID&pl=$l&zmienna=w\">TAK</a>&nbsp&nbsp<a href=\"slowniki_1.php?pl=$l&zmienna=w\">NIE</a></h1>";
}
if ($G=="j")
{
$select=  "SELECT * FROM JEZYKI where id=$id";
$query=mysql_query($baza,$select);
$wiersz = mysql_fetch_object($query);


	echo '<h1> Czy napewno chcesz usunąć język: <br><br>'. $wiersz->NAZWA.'?</h1>';
	echo "<h1><a href=\"usunS.php?id=$wiersz->ID&pl=$l&zmienna=j\">TAK</a>&nbsp&nbsp<a href=\"slowniki_1.php?pl=$l&zmienna=j\">NIE</a></h1>";
}
if ($G=="k")
{
$select=  "SELECT * FROM KRAJE where id=$id";
$query=mysql_query($baza,$select);
$wiersz = mysql_fetch_object($query);


	echo '<h1> Czy napewno chcesz usunąć kraj: <br><br>'. $wiersz->NAZWA.'?</h1>';
	echo "<h1><a href=\"usunS.php?id=$wiersz->ID&pl=$l&zmienna=k\">TAK</a>&nbsp&nbsp<a href=\"slowniki_1.php?pl=$l&zmienna=k\">NIE</a></h1>";
}
if ($G=="r")
{
$select=  "SELECT * FROM ROLE_A where id=$id";
$query=mysql_query($baza,$select);
$wiersz = mysql_fetch_object($query);



	echo '<h1> Czy napewno chcesz usunąć rolę artysty: <br><br>'. $wiersz->NAZWA.'?</h1>';
	echo "<h1><a href=\"usunS.php?id=$wiersz->ID&pl=$l&zmienna=r\">TAK</a>&nbsp&nbsp<a href=\"slowniki_1.php?pl=$l&zmienna=r\">NIE</a></h1>";
}	
	mysql_free_result($query);
	mysql_close($baza);	
	  
	  ////////////////////////////////////////////////////////////////////////////////////////////////////
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
