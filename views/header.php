<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>

<!-- Basic Page Needs ================================================== 
================================================== -->

<meta charset="utf-8">
<title>Rent-a-car</title>
<meta name="description" content="Rent-a-car, Akcija, iznajmljivanje vozila, Pogledaj ponudu">
<meta name="author" content="Strahinja Popadić">
<meta name="keywords" content="Rent-a-car, automobili, akcija, fiat, mazda, mercedes">
<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<!-- Mobile Specific Metas ================================================== 
================================================== -->

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

<!-- CSS ==================================================
================================================== -->

<link rel="stylesheet" href="../assets/css/base.css">
<link rel="stylesheet" href="../assets/css/skeleton.css">
<link rel="stylesheet" href="../assets/css/screen.css">
<link rel="stylesheet" href="../assets/css/prettyPhoto.css" type="text/css" media="screen" />

<!-- Favicons ==================================================
================================================== -->

<link rel="shortcut icon" href="../assets/images/ikonica.ico">
<link rel="apple-touch-icon" href="../assets/images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="../assets/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="../assets/images/apple-touch-icon-114x114.png">

<!-- Google Fonts ==================================================
================================================== -->
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Content Part ==================================================
================================================== -->
<div id="header">
  <div class="container"> 
    <!-- Header | Logo, Menu
		================================================== -->
    <div class="logo"><a href="home.php"><img src="../assets/images/logo.png" width="300px" alt="logo" /></a></div>
    <div class="mainmenu">
      <div id="mainmenu">
        <ul class="sf-menu">

        <?php 
            $upit = "SELECT * FROM menu";

            $rezultat = $conn->query($upit);

            $podaci = $rezultat->fetchAll();

            foreach ($podaci as $podatak):
        ?>

        <li><a href="<?=$podatak->href?>"><?=$podatak->title?></a></li>

            <?php endforeach; ?>

        </ul>
      </div>
      <!-- mainmenu ends here --> 
      
      <!-- Responsive Menu -->
      <form id="responsive-menu" action="#" method="post">
        <select>
          <option value="">Meni</option>

                <?php 
                     $upit = "SELECT * FROM menu";

                     $rezultat = $conn->query($upit);
         
                     $podaci = $rezultat->fetchAll();
         
                     foreach ($podaci as $podatak):
                ?>

            <option value="<?=$podatak->href?>"><?=$podatak->title?></option>


                     <?php endforeach; ?>

        </select>
      </form>
    </div>
    <!-- mainmenu ends here --> 
  </div>
  <!-- container ends here --> 
</div>
<!-- header ends here --> 