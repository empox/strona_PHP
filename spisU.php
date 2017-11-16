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

$idp=$_GET['idp'];

//echo $idp;
$select = "SELECT * FROM PLYTY where ID=$idp";
$query = mysql_query($select);
$wiersz = mysql_fetch_object($query);

$ida = $wiersz->ID_ALBUMY;
if ($_SESSION['log']){
echo "<h1><a href=\"plyty.php\">".$wiersz->TYTUL.'&nbsp&nbsp<a href="form.php?op=0&idp='.$idp.'"><img src="dodaj.png"></a></h1>';
}
else{
echo "<h1><a href=\"plyty.php\">".$wiersz->TYTUL.'&nbsp&nbsp</h1>';
}

$select = 'SELECT * FROM UTWORY where ID_PLYTY='.$idp.' ORDER BY NUMER';
$query = mysql_query($select);





echo '<table>';
while ($wiersz = mysql_fetch_object($query)){

	$idu=$wiersz->ID;
	
	if (empty($idu)){
	}
	else{
	
	$select2 = "select w.NAZWA from WYKONAWCY w INNER JOIN AUTORZY a on w.ID=a.ID_WYKONAWCY where a.ID_UTWORY=$idu"; 
	$query2 = mysql_query($select2);
	
	

	
	if ($wiersz->CZAS_SEK>=10){
		if ($_SESSION['log']){
		echo '<tr><td><h6> '.$wiersz->NUMER,'.</h6></td> <td><h6>',$wiersz->TYTUL,'</h6></td> <td><h6>&nbsp&nbsp&nbsp',$wiersz->CZAS_MIN,':',$wiersz->CZAS_SEK,'</h6></td>  <td><h6>'.'<a href="usun.php?idu='.$wiersz->ID.'">&nbsp&nbsp<img src="usun2m.png"></a>'.'</h6></td>
		<td><h6>'.'<a href="form.php?idu='.$wiersz->ID.'&op=1&idp='.$idp.'">&nbsp&nbsp<img src="popraw.png"></a>'.'</h6></td></tr>';
		}
		else{
		echo '<tr><td><h6> '.$wiersz->NUMER,'.</h6></td> <td><h6>',$wiersz->TYTUL,'</h6></td> <td><h6>&nbsp&nbsp&nbsp',$wiersz->CZAS_MIN,':',$wiersz->CZAS_SEK,'</h6></td></tr>';
		}	
	
	while ($wiersz2=mysql_fetch_object($query2)){
	echo '<tr><td> </td><td><pp1> - '.$wiersz2->NAZWA.'</pp1></td></tr>';
	}
	if ($_SESSION['log']){
	echo "<tr><td> </td><td><pp3><a href=\"add_wykU.php?idu=$wiersz->ID&idp=$idp&ida=$ida\"><img src=\"dodaj2.png\"> </pp3></td></tr>";
	}
	}		
	
	
	
	
	if ($wiersz->CZAS_SEK==null){
	if ($_SESSION['log']){
	echo '<tr><td><h6> '.$wiersz->NUMER,'.</h6></td> <td><h6>',$wiersz->TYTUL,'</h6></td> <td><h6>&nbsp&nbsp&nbsp',$wiersz->CZAS_MIN,'',$wiersz->CZAS_SEK,'</h6></td>  <td><h6>'.'<a href="usun.php?idu='.$wiersz->ID.'">&nbsp&nbsp<img src="usun2m.png"></a>'.'</h6></td>
		<td><h6>'.'<a href="form.php?idu='.$wiersz->ID.'&op=1&idp='.$idp.'">&nbsp&nbsp<img src="popraw.png"></a>'.'</h6></td></tr>';
	}
	else{
	echo '<tr><td><h6> '.$wiersz->NUMER,'.</h6></td> <td><h6>',$wiersz->TYTUL,'</h6></td> <td><h6>&nbsp&nbsp&nbsp',$wiersz->CZAS_MIN,'',$wiersz->CZAS_SEK,'</h6></td></tr>';
	}
	//wykonawcy
	$query2 = mysql_query($baza,$select2);
	while ($wiersz2=mysql_fetch_object($query2)){
	
	echo '<tr><td> </td><td><pp1> - '.$wiersz2->NAZWA.'</pp1></td></tr>';
	}
	if ($_SESSION['log']){
	echo "<tr><td> </td><td><pp3><a href=\"add_wykU.php?idu=$wiersz->ID&idp=$idp&ida=$ida\"><img src=\"dodaj2.png\"> </pp3></td></tr>";
	}
	}
	
	
	
	if($wiersz->CZAS_SEK<10 && $wiersz->CZAS_SEK!=null){
	if ($_SESSION['log']){
		echo '<tr><td><h6> '.$wiersz->NUMER,'.</h6></td> <td><h6>',$wiersz->TYTUL,'</h6></td> <td><h6>&nbsp&nbsp&nbsp',$wiersz->CZAS_MIN,':0',$wiersz->CZAS_SEK,'</h6></td>  <td><h6>'.'<a href="usun.php?idu='.$wiersz->ID.'">&nbsp&nbsp<img src="usun2m.png"></a>'.'</h6></td>
		<td><h6>'.'<a href="form.php?idu='.$wiersz->ID.'&op=1&idp='.$idp.'">&nbsp&nbsp<img src="popraw.png"></a>'.'</h6></td></tr>';
	}
	else{
	echo '<tr><td><h6> '.$wiersz->NUMER,'.</h6></td> <td><h6>',$wiersz->TYTUL,'</h6></td> <td><h6>&nbsp&nbsp&nbsp',$wiersz->CZAS_MIN,':0',$wiersz->CZAS_SEK,'</h6></td></tr>';
	}
	
	//wykonawcy
	$query2 = mysql_query($select2);
	while ($wiersz2=mysql_fetch_object($query2)){
	
	echo '<tr><td> </td><td><pp1> - '.$wiersz2->NAZWA.'</pp1></td></tr>';
	}
	if ($_SESSION['log']){
	echo "<tr><td> </td><td><pp3><a href=\"add_wykU.php?idu=$wiersz->ID&idp=$idp&ida=$ida\"><img src=\"dodaj2.png\"> </pp3></td></tr>";
	}
	}

}}
echo '</table>';


/*
elementy interfejsu dla zwyklego usera:
zaloguj
Albumy
zesstawienia
szukaj
	po tytule
	po jezyku
	po gatunku
	po nosniku
	
	
po zalogowaniu

albumy + dodaj usun modyfkuj
wykonawcy 
sestawienia
szukaj...

slowniki
	kraje
	jezyki
	gatunki
	wydawcy
	nosniki
	





*/


if($idu){
mysql_free_result($query2);
}
mysql_free_result($query);
mysql_close($baza);


?>
<br/>
<h2><a href="plyty.php"> Wroc do spisu </a></h2>

<!-- ===================================================== -->
  
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
          <p>Copyright &copy; Wojciech Ceranka 2014; Projekt: Internetowe Interfejsy Systemółw Bazodanowych<p><!--link_baza_stop-->
    <div class="clear"></div>
  </div>

  <div class="clear"></div>
</div>

</div>
</body>
</html>
