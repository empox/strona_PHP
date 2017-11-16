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
	
	

<?php
include 'polaczenie.php';

		if (!empty($_POST['tytul']) || !empty($_POST['gatunek']) || !empty($_POST['jezyk']))
		{
		echo '<h1><a href="szukaj.php">Szukasz utworu</a></h1>';

		$_SESSION['tytul'] = $_POST['tytul'];
		$_SESSION['gatunek'] = $_POST['gatunek'];
		$_SESSION['jezyk'] = $_POST['jezyk'];
		$select = 'SELECT * FROM UTWORY 
				INNER JOIN GATUNKI ON UTWORY.ID_GATUNKI = GATUNKI.ID 
				INNER JOIN JEZYKI ON UTWORY.ID_JEZYKI = JEZYKI.ID 
				WHERE JEZYKI.NAZWA LIKE \'%'.$_SESSION['jezyk'].'%\' 
				AND GATUNKI.NAZWA LIKE \'%'.$_SESSION['gatunek'].'%\' 
				AND UTWORY.TYTUL LIKE \'%'.$_SESSION['tytul'].'%\'';
		$query = mysql_query($select);
		

		while ($wiersz = mysql_fetch_object($query)) 
				{
		$select1 = 'SELECT ID_ALBUMY FROM PLYTY WHERE ID='.$wiersz->ID_PLYTY;
		$query1 = mysql_query($select1);
		$wiersz1 = mysql_fetch_object($query1);			
		
		echo "<h6><a href=\"spisU.php?idp=$wiersz->ID_PLYTY\"> ".$wiersz->TYTUL."</a></h6>\r";
				}
}
		
		
if (empty($_POST['w1']))
		{
		}
		else
		{
				echo '<h1><a href="szukaj.php">Szukasz albumu</a></h1>';
$zmienna1 =$_POST['w1'];
$select= "SELECT ID,TYTUL FROM ALBUMY WHERE TYTUL like '%$zmienna1%' ORDER BY TYTUL";
		$query = mysql_query($select);
		
		while ($wiersz = mysql_fetch_object($query)) 
				{
					echo "<h6><a href=\"spisPA.php?idpa=".$wiersz->ID, "\"> ".$wiersz->TYTUL,"</a></h6>\r";
				}	
			
	echo "<br><br>";}
	
	if (empty($_POST['w']))
		{
		
		}
		
		else
		{
				echo '<h1><a href="szukaj.php">Szukasz płyty</a></h1>';
	$zmienna =$_POST['w'];
$select= "SELECT * FROM PLYTY WHERE TYTUL like '%$zmienna%' ORDER BY TYTUL";
		$query = mysql_query($select);
		while ($wiersz = mysql_fetch_object($query)) 
				{
				
					echo "<h6><a href=\"spisU.php?idp=$wiersz->ID\"> ".$wiersz->TYTUL,"</a></h6>\r";
				}
			mysql_free_result($query);
			mysql_close($baza);	
echo "<br><br>";}
	
	if (empty($_POST['w2']))
		{
		
		}
		
		else
		{
				echo '<h1><a href="szukaj.php">Szukasz utworu</a></h1>';
	$zmienna2 =$_POST['w2'];
$select= "SELECT ID_PLYTY,TYTUL FROM UTWORY WHERE  TYTUL like '%$zmienna2%' ORDER BY TYTUL";
		$query = mysql_query($select);
		while ($wiersz = mysql_fetch_object($query)) 
				{
		$select1 = 'SELECT ID_ALBUMY FROM PLYTY WHERE ID='.$wiersz->ID_PLYTY."";
		$query1 = mysql_query($select1);
		$wiersz1 = mysql_fetch_object($query1);			
					echo "<h6><a href=\"spisU.php?idp=$wiersz->ID_PLYTY\"> ".$wiersz->TYTUL."</a></h6>\r";
				}
			mysql_free_result($query);
			mysql_close($baza);	
		
		echo "<br><br>";
		}
		
		if (empty($_POST['w3']))
		{
		}
		
		else
		{
				echo '<h1><a href="szukaj.php">Szukasz wykonawcy</a></h1>';
	$zmienna3 =$_POST['w3'];
$select= "SELECT NAZWA FROM WYKONAWCY WHERE NAZWA like '%$zmienna3%' ORDER BY NAZWA";
		$query = mysql_query($select);
		echo "<table>";
		while ($wiersz = mysql_fetch_object($query)) 
				{
					echo "<tr><td><h6>".$wiersz->NAZWA,"</h6></td><td></td></tr>";
				}
				echo "</table>";
				}


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
          <h6>Copyright &copy; Wojciech Ceranka 2014; Projekt: Internetowe Interfejsy Systemółw Bazodanowych<!--link_baza_stop-->
    <div class="clear"></div>
  </div>

  <div class="clear"></div>
</div>

</div>
</body>
</html>
