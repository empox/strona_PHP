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
$_SESSION['ID_WYKONAWCY'] = $_GET['IDW'];
$_SESSION['ID_UTWORU'];


include('polaczenie.php');
$wykonawca = $_GET['IDW'];
$IDP=$_GET['IDP'];

$select = "SELECT NAZWA FROM WYKONAWCY WHERE ID =".$wykonawca;
$query = mysql_query($select);
$wiersz = mysql_fetch_object($query);
$nazwa_wykonawcy = $wiersz->NAZWA;
?>
<h1>Wybierz role dla artysty: <?php echo $nazwa_wykonawcy ?> </h1>

<?php
echo '<form action="add_autorzy.php?IDP='.$IDP.'" method="post">';
echo "<table>\n";
echo "<tr>";
echo '<td><h4>Rola:</h4></td><td><h4><select name="rola">';
$select_wykonawcy_all = 'SELECT * FROM ROLE_A ORDER BY NAZWA';
$query_wykonawcy_all = mysql_query($select_wykonawcy_all);
echo '<option value=""> </option>'."\n";
while ($wiersz_wykonawcy_all  = mysql_fetch_object($query_wykonawcy_all))
	{
		echo '<option value="'.$wiersz_wykonawcy_all->ID.'">'.$wiersz_wykonawcy_all->NAZWA.' </option>'."\n";
	}
echo "</select></h4></td></tr>\n ";
echo "<tr><td><h4>Notatka:</h4></td><td><h4><input type = \"text\" name = \"notatka\"></h4></td>";


echo "<tr><td><input type=\"submit\" value=\"ZAPISZ\"></td></tr></form>";
//echo '<td><a href="add_artist.php?IDP='.$IDP.'&IDU='.$_SESSION['ID_UTWORU'].'"><img src="no.png"></a></td></tr>'.'</div></tr></table></h4>'; 
echo "</table><form method=\"post\" action=\"add_wykU.php?idp=$IDP&idu=".$_SESSION['ID_UTWORU']."\"><input type=\"submit\" value=\"ANULUJ\"></form>";
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
