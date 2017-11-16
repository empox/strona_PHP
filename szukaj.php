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
      	  
<h1><a href="index.php">Szukaj</a></h1>

<h3>Wyszukiwanie po nazwie: </h3><br>
<table>

<h6>Albumu  </h6><form name="input" action="szukaj1.php" method="post">
<input type="text" name="w1">
<input type="submit" value="Szukaj">
</form>
<h6>Płyty </h6>  <form name="input" action="szukaj1.php" method="post">
<input type="text" name="w">
<input type="submit" value="Szukaj">
</form>
<h6>Utworu</h6>   <form name="input" action="szukaj1.php" method="post">
<input type="text" name="w2">
<input type="submit" value="Szukaj">
</form>
<h6>Wykonawcy</h6>   <form name="input" action="szukaj1.php" method="post">
<input type="text" name="w3">
<input type="submit" value="Szukaj">
</form>

</table>


<?php
echo '<h1>Szukaj utworu po: </h1><br>';

include 'polaczenie.php';

	echo '<FORM action="szukaj1.php" method = "POST" style="width: 120px">';
	echo '<TABLE>';
	echo '<tr><td><h6>Tytule: </h6></td><td><h6><input style="width: 120px" type="text" name = "tytul"></h6></td></tr>';
	echo "<tr>";
echo '<td><h6>Gatunku: </h6></td><td><h6><select name="gatunek" style="width: 120px">';
$selectg_all = 'SELECT * FROM GATUNKI ORDER BY NAZWA';
$queryg_all = mysql_query($selectg_all);
echo '<option value="" > </option>'."\n";
while ($wierszg_all  = mysql_fetch_object($queryg_all))
	{
	if ($OP)
	{
		if ($wiersz->ID_GATUNKI == $wierszg_all->ID ) 
		{
			echo '<option value="'.$wierszg_all->NAZWA.'" selected>'.$wierszg_all->NAZWA.' </option>'."\n";
		}
		else
		{
			echo '<option value="'.$wierszg_all->NAZWA.'">'.$wierszg_all->NAZWA.' </option>'."\n";
		}
	}
	else
	{
		echo '<option value="'.$wierszg_all->NAZWA.'" style="width: 120px">'.$wierszg_all->NAZWA.' </option>'."\n";
	}
	}
echo "</select></h6></td></tr>\n ";
	echo '<td><h6>Języku: </h6></td><td><h6><select name="jezyk" style="width: 120px">';
$selectj_all = 'SELECT * FROM JEZYKI ORDER BY NAZWA';
$queryj_all = mysql_query($selectj_all);
echo '<option value=""> </option>'."\n";
while ($wierszj_all  = mysql_fetch_object($queryj_all))
{
	if ($OP)
	{
		if ($wiersz->ID_JEZYKI == $wierszj_all->ID ) 
		{
			echo '<option value="'.$wierszj_all->NAZWA.'" selected>'.$wierszj_all->NAZWA.' </option>'."\n";
		}
		else
		{
			echo '<option value="'.$wierszj_all->NAZWA.'">'.$wierszj_all->NAZWA.' </option>'."\n";
		}
	}
	else
	{
		echo '<option value="'.$wierszj_all->NAZWA.'" style="width: 120px">'.$wierszj_all->NAZWA.' </option>'."\n";
	}
	
	}
echo "</select></h6></td></tr>\n";


	echo '<tr><td><input type="submit" value = "Dalej"</td></tr>';
	echo '</TABLE>';
	echo '</FORM>';
	
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
