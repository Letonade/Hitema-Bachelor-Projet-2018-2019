<?php include './assets/inc/application_include.php' ?>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Capsa Container</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="./css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
<style>
	.menu_btnn{
    width: 200px;
    background: lightblue;
    border: solid 1px white ;
    border-radius: 10px;
    color: black;
	font-weight: 600;
	margin: 10px auto;

  }
  </style>
</head>

<body>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
			<h1 id="colorlib-logo"><a href="index.html">Conteneur Design</a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<?php
				
				$connection = mysqli_connect("localhost", "root", "", "capsadomotique");
				
				$requete = mysqli_query($connection, "SELECT libelle FROM container");
		
				mysqli_fetch_array($requete);
		
				?>
				<form method="post">

					<div    name="id_container"  multiple>
						<?php 
						while ($resultat = mysqli_fetch_array($requete)) :; 

							echo '<div class="menu_btnn">
							 <option value="'.$resultat['libelle'].'">' .$resultat['libelle'].  '</option></div>';
							
						 endwhile; ?>

						</div>
					</form>
					<?php
//TRAITEMENT DE TON FORMULAIRE
$id_container = (isset($_POST["libelle"]))?$_POST["libelle"]:'';
 
if($id_container == 2)
{
	header('document:connexion.php');
}
else if($id_container == "")
{
	header('document:connexion.php');
}
	//ainsi de suite
?>

					<a href="connexion.php" style="text-aligne:center;width:80px; height:30px; margin-left:0px; "><input
							type="button" value="Deconexion" "></a>
		
		
		
					
					  </nav> </aside> <div id="colorlib-main">
					  <?php	  $id_vue = $_POST["RealViewId"]; ?>
					  
		<div class="colorlib-about">
							<div class="colorlib-narrow-content">
								<div class="row row-bottom-padded-md">
									<div class="row">
										<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box"
											data-animate-effect="fadeInLeft">
											<span class="heading-meta">Vue Conteneur</span>
											<h2 class="colorlib-heading">Ensemble des vues du conteneur</h2>
										</div>
									</div>
									
			<div class="row row-bottom-padded-md">

				
			<?php
			
        $TEST_REQ = 'SELECT COUNT(DISTINCT id_module_habitation) as module_habitation ,
         COUNT(DISTINCT id_module_gaz) as module_gaz ,
         COUNT(DISTINCT id_module_electricite) as module_electricite
         FROM container
         LEFT JOIN module_habitation ON module_habitation.id_container = container.id_container
         LEFT JOIN module_gaz ON module_gaz.id_container = container.id_container
         LEFT JOIN module_electricite ON module_electricite.id_container = container.id_container
         WHERE container.id_container = 2';

        $connQuery = new APP_BDD;
        if ($res = $connQuery->link->query($TEST_REQ))
        {
            foreach ($res as $key => $val) 
            {
                foreach ($val as $k => $v) {
                    if ($v > 0) {
                        ?>
        <form action="DetailModule.php" method="post">
		<input type="hidden" id = "id_container" name = "id_container" value = "<?php echo $id_container ?>">
		<input type="hidden" id = "type_module" name = "type_module" value = "<?php echo $k ?>">
		<input type="hidden" id = "id_vue" name = "id_vue" value = "<?php echo $id_vue ?>">
		<button type="submit "style="width:350px" heigh="auto" name="btnEnvoiForm" title="Envoyer">
		<div class="project" style="background-image: url(images/img-1.jpg);">
											<?php
$connection = new APP_BDD;				
$requete = 'SELECT * FROM $k  ORDER BY date_changement DESC LIMIT 1';
if ($res = $connection->link->query($requete)){
    unset($connection);
 foreach($res as $key => $val){
        print($val["consommation"]);
    }
}
?>

											</div></button>
										</div></form >
                        <?php
                                       }
                    //print_r($v);
                }
            }
        }
       

        //print_r($res);


?>

										

										</div>
									</div>
								</div>

							</div>
						</div>
	</div>
	</div>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Sticky Kit -->
	<script src="js/sticky-kit.min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>


	<!-- MAIN JS -->
	<script src="js/main.js"></script>

</body>

</html>