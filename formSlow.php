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
		
		
$op=$_GET['op'];
$ID=$_GET['ID'];
$pl=$_GET['pl'];
include 'polaczenie.php';

$G=$_GET['G'];
$qta="g";
	if ($_GET['G']=="g")
		{
		
		if ($op)
		{echo '<h1> Edycja Gatunku</h1>';
		$select = 'SELECT * FROM GATUNKI where ID='.$ID;
		$query = mysql_query($select);
		$wiersz  = mysql_fetch_object($query);
		}
		else {
		echo '<h1> Dodawanie Gatunku</h1>';
		}
		
		echo "<h4>Wypełnij pola które chcesz zmodyfikować</h4>";
		echo "<table>\n";
		echo '<form action="edit_addSlow.php" method="post">';
		
		if ($op)
			{
				echo '<tr><td><h4>Nazwa &nbsp</h4></td><td><h4><input type="text" name="nazwa" value="'.$wiersz->NAZWA.'"></h4></td></tr>';
				echo '<tr><td><input type="hidden" name="op" value="'.$op.'"></td></tr>'."\n";
				echo '<tr><td><input type="hidden" name="pl" value="'.$pl.'"></td></tr>'."\n";
				echo '<tr><td><input type="hidden" name="ID" value="'.$wiersz->ID.'"></td></tr>'."\n";
				echo '<tr><td><input type="hidden" name="G" value="'.$qta.'"></td></tr>'."\n";
				echo '<tr><td><input type="submit" value="ZAPISZ"  id="submit"></td>';
				mysql_free_result($query);
			}
		else{
				echo '<tr><td><h4>Nazwa</h4></td><td><h4><input type="text" name="nazwa" value="'.$wiersz->NAZWA.'"></h4></td></tr>';
				echo '<tr><td><input type="hidden" name="G" value="'.$qta.'"></td></tr>'."\n";
				echo '<tr><td><input type="hidden" name="op" value="'.$op.'"></td></tr>'."\n";
				echo '<tr><td><input type="hidden" name="pl" value="'.$pl.'"></td></tr>'."\n";
				echo '<tr><td><input type="submit" value="ZAPISZ"  id="submit"></td>';
			}
		echo "</form>";	
		echo "</table><form method=\"post\" action=\"slowniki.php?pl=$pl\"><input type=\"submit\" value=\"ANULUJ\">";
		}
		
		
$qta="n";
if ($G=="n")
{
$zmienna ="NOSNIKI";
if ($op)
{
echo '<h1> Edycja Nośnika</h1>';
$select = "SELECT * FROM NOSNIKI where ID=".$ID;
$query = mysql_query($select);
$wiersz  = mysql_fetch_object($query);
}
else {
echo '<h1> Dodawanie Nośnika</h4>';
}
echo '<form action="edit_addSlow.php" method="post">';
echo "<h4>Wypełnij pola które chcesz zmodyfikować</h4>";
echo "<table>\n";



if ($op)
	{
		echo '<tr><td><h4>Nazwa &nbsp</h4></td><td><h4><input type="text" name="nazwa" value="'.$wiersz->NAZWA.'"></h4></td></tr>';
		echo '<tr><td><input type="hidden" name="G" value="'.$qta.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="op" value="'.$op.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="ID" value="'.$wiersz->ID.'"></td></tr>'."\n";
		echo '<tr><td><input type="submit" value="ZAPISZ"  id="submit"></td>';
		mysql_free_result($query);
	}
else
	{
		echo '<tr><td><h4>Nazwa &nbsp</h4></td><td><h4><input type="text" name="nazwa" value="'.$wiersz->NAZWA.'"></h4></td></tr>';
		echo '<tr><td><input type="hidden" name="op" value="'.$op.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="G" value="'.$qta.'"></td></tr>'."\n";
		echo '<tr><td><input type="submit" value="ZAPISZ"  id="submit"></td>';
		
	}
		echo "</form>";	
		echo "</table><form method=\"post\" action=\"slowniki.php?pl=$pl\"><input type=\"submit\" value=\"ANULUJ\">";
}


 $qta="w";
if ($G=="w")
{
$zmienna ="WYDAWCY";
if ($op)
{echo '<h1> Edycja Wydawcy</h1>';
$select = "SELECT * FROM WYDAWCY where ID=".$ID;
$query = mysql_query($select);
$wiersz  = mysql_fetch_object($query);
}
else {echo '<h1> Dodawanie Wydawcy</h1>';
}
echo '<form action="edit_addSlow.php" method="post">';
echo "<h4>Wypełnij pola które chcesz zmodyfikować</h4>";
echo "<table>\n";



if ($op)
	{
		echo '<tr><td><h4>Nazwa &nbsp</h4></td><td><h4><input type="text" name="nazwa" value="'.$wiersz->NAZWA.'"></h4></td></tr>';
		echo '<tr><td><input type="hidden" name="G" value="'.$qta.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="op" value="'.$op.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="ID" value="'.$wiersz->ID.'"></td></tr>'."\n";
		echo '<tr><td><div><input type="submit" value="ZAPISZ"  id="submit"></div></td>';
		mysql_free_result($query);
	}
else
	{
		echo '<tr><td><h4>Nazwa &nbsp</h4></td><td><h4><input type="text" name="nazwa" value="'.$wiersz->NAZWA.'"></h4></td></tr>';
		echo '<tr><td><input type="hidden" name="op" value="'.$op.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="G" value="'.$qta.'"></td></tr>'."\n";
		echo '<tr><td><div><input type="submit" value="ZAPISZ"  id="submit"><div/></td>';
		
	}
	echo "</form>";	
	echo "</table><form method=\"post\" action=\"slowniki.php?pl=$pl\"><input type=\"submit\" value=\"ANULUJ\">";
}


 $qta="j";
if ($G=="j")
{
$zmienna ="JEZYKI";
if ($op)
{echo '<h1> Edycja Języku<h1>';
$select = "SELECT * FROM JEZYKI where ID=".$ID;
$query = mysql_query($select);
$wiersz  = mysql_fetch_object($query);
}
else {echo '<h1> Dodawanie Języka</h1>';
}
echo '<form action="edit_addSlow.php" method="post">';
echo "<h4>Wypełnij pola które chcesz zmodyfikować</h4>";
echo "<table>\n";


if ($op)
	{
		echo '<tr><td><h4>Nazwa &nbsp</h4></td><td><h4><input type="text" name="nazwa" value="'.$wiersz->NAZWA.'"></h4></td></tr>';
		echo '<tr><td><input type="hidden" name="G" value="'.$qta.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="op" value="'.$op.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="ID" value="'.$wiersz->ID.'"></td></tr>'."\n";
		echo '<tr><td><div><input type="submit" value="ZAPISZ"  id="submit"></div></td>';
		mysql_free_result($query);
	}
else
	{
		echo '<tr><td><h4>Nazwa &nbsp</h4></td><td><h4><input type="text" name="nazwa" value="'.$wiersz->NAZWA.'"></h4></td></tr>';
		echo '<tr><td><input type="hidden" name="op" value="'.$op.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="G" value="'.$qta.'"></td></tr>'."\n";
		echo '<tr><td><div><input type="submit" value="ZAPISZ"  id="submit"><div/></td>';
		
	}
	echo "</form>";	
	echo "</table><form method=\"post\" action=\"slowniki.php?pl=$pl\"><input type=\"submit\" value=\"ANULUJ\">";
	
	
}
 $qta="k";
if ($G=="k")
{
$zmienna ="KRAJE";
if ($op)
{echo '<h1> Edycja Kraju</h1>';
$select = "SELECT * FROM KRAJE where ID=".$ID;
$query = mysql_query($select);
$wiersz  = mysql_fetch_object($query);
}
else {echo '<h1> Dodawanie Kraju</h1>';
}
echo '<form action="edit_addSlow.php" method="post">';
echo "<h4>Wypełnij pola które chcesz zmodyfikować</h4>";
echo "<table>\n";



if ($op)
	{
		echo '<tr><td><h4>Nazwa &nbsp</h4></td><td><h4><input type="text" name="nazwa" value="'.$wiersz->NAZWA.'"></h4></td></tr>';
		echo '<tr><td><input type="hidden" name="G" value="'.$qta.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="op" value="'.$op.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="ID" value="'.$wiersz->ID.'"></td></tr>'."\n";
		echo '<tr><td><div><input type="submit" value="ZAPISZ"  id="submit"></div></td>';
		mysql_free_result($query);
	}
else
	{
		echo '<tr><td><h4>Nazwa &nbsp</h4></td><td><h4><input type="text" name="nazwa" value="'.$wiersz->NAZWA.'"></h4></td></tr>';
		echo '<tr><td><input type="hidden" name="op" value="'.$op.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="G" value="'.$qta.'"></td></tr>'."\n";
		echo '<tr><td><div><input type="submit" value="ZAPISZ"  id="submit"><div/></td>';
		
	}
	echo "</form>";	
	echo "</table><form method=\"post\" action=\"slowniki.php?pl=$pl\"><input type=\"submit\" value=\"ANULUJ\">";
	
}
 $qta="r";
if ($G=="r")
{
$zmienna ="ROLE_A";
if ($op)
{echo '<h1> Edycja Roli</h1>
		<hr size="3" /><br>';
$select = "SELECT * FROM ROLE_A where ID=".$ID;
$query = mysql_query($select);
$wiersz  = mysql_fetch_object($query);
}
else {echo '<h1> Dodawanie Roli</h1>';
}
echo '<form action="edit_addSlow.php" method="post">';
echo "<h4>Wypełnij pola które chcesz zmodyfikować</h4>";
echo "<table>\n";



if ($op)
	{
		echo '<tr><td><h4>Nazwa &nbsp</h4></td><td><h4><input type="text" name="nazwa" value="'.$wiersz->NAZWA.'"></h4></td></tr>';
		echo '<tr><td><input type="hidden" name="G" value="'.$qta.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="op" value="'.$op.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="ID" value="'.$wiersz->ID.'"></td></tr>'."\n";
		echo '<tr><td><div><input type="submit" value="ZAPISZ"  id="submit"></div></td>';
		mysql_free_result($query);
	}
else
	{
		echo '<tr><td><h4>Nazwa &nbsp</h4></td><td><h4><input type="text" name="nazwa" value="'.$wiersz->NAZWA.'"></h4></td></tr>';
		echo '<tr><td><input type="hidden" name="op" value="'.$op.'"></td></tr>'."\n";
		echo '<tr><td><input type="hidden" name="G" value="'.$qta.'"></td></tr>'."\n";
		echo '<tr><td><div><input type="submit" value="ZAPISZ"  id="submit"><div/></td>';
		
	}
	echo "</form>";	
	echo "</table><form method=\"post\" action=\"slowniki.php?pl=$pl\"><input type=\"submit\" value=\"ANULUJ\">";
}



mysql_close($baza);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
          <p>Copyright &copy; Wojciech Ceranka 2014; Projekt: Internetowe Interfejsy System??azodanowych<!--link_baza_stop-->
    <div class="clear"></div>
  </div>

  <div class="clear"></div>
</div>

</div>
</body>
</html>
