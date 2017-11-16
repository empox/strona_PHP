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

		$G=$_POST['gg'];
		settype($G, 'integer');
		$gs=1;
		settype($gs, 'integer');
		if ($G==$gs || ($_GET['zmienna']=="g"))
		{
		echo '<h1><a href="slowniki.php">Słownik: Gatunki</a><a href="formSlow.php?&ID='.$wiersz->ID."&op=0&G=g".'">&nbsp&nbsp<img src="dodaj.png"></a></h1><br>';
			$l=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","R","S","T","U","W","X","Y","Z");
			$c=count($l);
			
			echo "<p>";
			for ($i=0;$i<=$c-2;$i++)
			{
			echo "<a href=\"slowniki_1.php?pl=$l[$i]&zmienna=g"."\">".$l[$i]." - </a>\r";	
			}
			if ($i=$c-1){
			echo "<a href=\"slowniki_1.php?pl=$l[$i]&zmienna=g"."\">".$l[$i]."</a>\r";	
			}
			echo "<br></p>";
			
			
			if (empty($_GET['pl']))
			{
			}
			else {
			$pl=$_GET['pl'];	
			$select= "SELECT  * FROM GATUNKI WHERE UPPER(NAZWA) LIKE  '$pl%' ORDER BY NAZWA";
			$query = mysql_query($select);			
			echo "<table>";
			while ($wiersz = mysql_fetch_object($query)) 
			{
			
			//<td><h4><a href=\"usuwanieAlb.php?ida=$wiersz->ID&op=0\">&nbsp&nbsp<img src=\"usun2m.png\"></a></h4></td> <td><h4><a href=\"formAlb.php?ida=$wiersz->ID&op=1\">&nbsp&nbsp<img src=\"popraw.png\"></a></h4></td></tr>\n\r"
			echo "<tr><td><h4>".$wiersz->NAZWA,"</h4></td><td><h4>&nbsp<a href =\"usuwanieSlow.php?ID=".$wiersz->ID,"&l=".$pl,"&G=g"."\">".'&nbsp&nbsp<img src="usun2m.png"></a></h4></td><td><h4><a href="formSlow.php?ID='.$wiersz->ID,"&op=1","&pl=".$pl."&G=g".'">&nbsp&nbsp<img src="popraw.png"></a></h4></td></tr>'."\n\r";
			}
			echo "</table>";				
			}			
		}
		
		
		
		
		$gs=2;
		if ($G==$gs || ($_GET['zmienna'])=="n")
		{
		echo '<h1><a href="slowniki.php"> Słownik: Nośniki </a><a href="formSlow.php?&ID='.$wiersz->ID."&op=0&G=n".'"><img src="dodaj.png"></a></h1><br>';
			$select= "SELECT  * FROM NOSNIKI WHERE UPPER(NAZWA) LIKE  '$pl%' ORDER BY NAZWA";
				$query = mysql_query($select);			
				echo "<table>";
				while ($wiersz = mysql_fetch_object($query)) 
				{
				echo "<tr><td><h4>".$wiersz->NAZWA,"</h4></td><td><h4><a href =\"usuwanieSlow.php?ID=".$wiersz->ID."&G=n"."\">".'&nbsp&nbsp<img src="usun2m.png"></a></h4></td><td><h4><a href="formSlow.php?ID='.$wiersz->ID,"&op=1","&G=n".'">'.'&nbsp&nbsp<img src="popraw.png"></a></h4></td></tr>';
				}
				echo "</table>";	
	}
		
		
		
		
		$gs=3;
		if ($G==$gs || ($_GET['zmienna'])=="w")
		{
		echo '<h1><a href="slowniki.php"> Słownik: Wydawcy </a><a href="formSlow.php?&ID='.$wiersz->ID."&op=0&G=w".'"><img src="dodaj.png"></a></h1><br>';
			$select= "SELECT  * FROM WYDAWCY ORDER BY NAZWA";
				$query = mysql_query($select);
				echo "<table>";
				while ($wiersz = mysql_fetch_object($query)) 
				{
				echo "<tr><td><h4>".$wiersz->NAZWA."</h4></td><td><h4><a href =\"usuwanieSlow.php?ID=".$wiersz->ID."&G=w"."\">".'&nbsp&nbsp<img src="usun2m.png"></a></h4></td><td><h4><a href="formSlow.php?ID='.$wiersz->ID,"&op=1","&G=w".'">'.'&nbsp&nbsp<img src="popraw.png"></a></h4></td></tr>';
				}
				echo "</table>";
				echo "$pl";
	}
	
	
	
	
		$gs=4;
		if ($G==$gs || ($_GET['zmienna'])=="j")
		{
		echo '<h1><a href="slowniki.php"> Słownik: Języki </a><a href="formSlow.php?&ID='.$wiersz->ID."&op=0&G=j".'"><img src="dodaj.png"></a></h1><br>';
			$select= "SELECT  * FROM JEZYKI WHERE UPPER(NAZWA) LIKE  '$pl%' ORDER BY NAZWA";
				$query = mysql_query($select);			
				echo "<table>";
				while ($wiersz = mysql_fetch_object($query)) 
				{
				echo "<tr><td><h4>".$wiersz->NAZWA,"</h4></td><td><h4><a href =\"usuwanieSlow.php?ID=".$wiersz->ID."&G=j"."\">".'&nbsp&nbsp<img src="usun2m.png"></a></h4></td><td><h4><a href="formSlow.php?ID='.$wiersz->ID,"&op=1","&G=j".'">'.'&nbsp&nbsp<img src="popraw.png"></a></h4></td></tr>';
				}
				echo "</table>";
	}
	
	
	
		$gs=5;
		if ($G==$gs || ($_GET['zmienna'])=="k")
		{
		echo '<h1><a href="slowniki.php"> Słownik: Kraje </a><a href="formSlow.php?&ID='.$wiersz->ID."&op=0&G=k".'"><img src="dodaj.png"></a></h1><br>';
			$select= "SELECT  * FROM KRAJE WHERE UPPER(NAZWA) LIKE  '$pl%' ORDER BY NAZWA";
				$query = mysql_query($select);			
				echo "<table>";
				while ($wiersz = mysql_fetch_object($query)) 
				{
				echo "<tr><td><h4>".$wiersz->NAZWA,"</h4></td><td><h4><a href =\"usuwanieSlow.php?ID=".$wiersz->ID."&G=k"."\">".'&nbsp&nbsp<img src="usun2m.png"></a></h4></td><td><h4><a href="formSlow.php?ID='.$wiersz->ID,"&op=1","&G=k".'">'.'&nbsp&nbsp<img src="popraw.png"></a></h4></td></tr>';
				}
				echo "</table>";
		}
		
		
		
		$gs=6;
		if ($G==$gs || ($_GET['zmienna'])=="r")
		{
			echo '<h1><a href="slowniki.php"> Słownik: Role </a><a href="formSlow.php?&ID='.$wiersz->ID."&op=0&G=r".'"><img src="dodaj.png"></a></h1><br>';
				$select= "SELECT  * FROM ROLE_A WHERE UPPER(NAZWA) LIKE  '$pl%' ORDER BY NAZWA";
				$query = mysql_query($select);			
				echo "<table>";
				while ($wiersz = mysql_fetch_object($query)) 
				{
				echo "<tr><td><h4>".$wiersz->NAZWA,"</h4></td><td><h4><a href =\"usuwanieSlow.php?ID=".$wiersz->ID."&G=r"."\">".'&nbsp&nbsp<img src="usun2m.png"></a></h4></td><td><h4><a href="formSlow.php?ID='.$wiersz->ID,"&op=1","&G=r".'">'.'&nbsp&nbsp<img src="popraw.png"></a></h4></td></tr>';
				}
				echo "</table>";
		}
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
