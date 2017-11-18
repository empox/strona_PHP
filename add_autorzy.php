<?php
session_start();
error_reporting(0);
$idp=$_GET['IDP'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta HTTP-EQUIV="refresh" Content="3; url=spisU.php?<?php echo"idp=$idp\""; ?>>
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
include('polaczenie.php');

$ROLA = $_POST['rola'];
$NOTATKA = $_POST['notatka'];
$_SESSION['ID_WYKONAWCY'];
$_SESSION['ID_UTWORU'];

$select = "SELECT * FROM AUTORZY ";
$query = mysql_query($select);
$wiersz = mysql_fetch_object($query);


$insert ="INSERT INTO AUTORZY (ID_UTWORY, ID_WYKONAWCY, ID_ROLE_A,NOTATKA) 
		  VALUES(".$_SESSION['ID_UTWORU'].", ".$_SESSION['ID_WYKONAWCY'].",".$ROLA.",'".$NOTATKA."')"; 
$query = mysql_query($insert);
$wiersz = mysql_fetch_object($query);
echo "<h1>Wykonawca został dodany do utworu!</h1>";
echo "<p>Za chwilkę nastąpi przekierowanie na stronę ze słownikami...</p>";
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
