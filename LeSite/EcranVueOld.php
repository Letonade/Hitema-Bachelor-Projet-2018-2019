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
        .menu_btnn {
            width: 200px;
            background: lightblue;
            border: solid 1px white;
            border-radius: 10px;
            color: black;
            font-weight: 600;
            margin: 10px auto;

        }

        .colorlib-about {
            padding-left: 300px;
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

                $requete = mysqli_query($connection, "SELECT id_container, libelle FROM container");

                mysqli_fetch_array($requete);

                ?>
                <form method="post">

                    <div name="id_container" multiple>
                        <?php
                        while ($resultat = mysqli_fetch_array($requete)) :;

                            echo '<button class="menu_btnn"  type="submit" name="idsubmit" value="' . $resultat['id_container'] . '">';
                            echo '<p>' . $resultat['libelle'] . '</p>';
                            //  echo  '<button type="submit" name="idsubmit" value="' . $resultat['id_container'] . '"> </button>';


                            echo '</button>';

                        endwhile; ?>

                    </div>
                </form>
                
                <a href="connexion.php" style="text-aligne:center;width:80px; height:30px; margin-left:0px; "><input type="button" value="Deconexion" "></a>
		
					
                      </nav> </aside>
                    
                      
                      <div id=" colorlib-main">


                    <div class="colorlib-about">
                        <div class="colorlib-narrow-content">
                            <div class="row row-bottom-padded-md">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                                        <span class="heading-meta">Vue Conteneur</span>
                                        <h2 class="colorlib-heading">Ensemble des vues du conteneur</h2>
                                    </div>
                                </div>

                                <div class="row row-bottom-padded-md">
                                    <?php

                                    if (isset($_POST['idsubmit'])) {
                                        $idcont = $_POST['idsubmit'];
                                       
     $connection = mysqli_connect("localhost", "root", "", "capsadomotique");
        $REQ_GAZ = 'SELECT id_module_gaz, consommation, date_changement, 
        consommation_max FROM module_gaz WHERE id_container = '.$idcont.' ORDER BY date_changement DESC LIMIT 1';

$requete = mysqli_query($connection, $REQ_GAZ);
$data_gaz=mysqli_fetch_array($requete);
echo "<script>console.log('" . json_encode($data_gaz) . "');</script>";
if($data_gaz!=null){
echo '<form method="post" action="DetailModule.php">';
echo '<button type="submit "style="width:350px" heigh="auto" name="btnEnvoiForm" title="Envoyer">
<div class="project" style="background-image: url(images/img-1.jpg);">';
echo "<h2>Modules Gaz</h2>";
echo "<h3>Consommation: ".$data_gaz["consommation"]."</h3>";
echo '<input type="hidden" name="id_container" value="'.$idcont.'">';
echo '<input type="hidden" name="type_module" value="module_gaz">';
echo '<input type="hidden" name="id_vue" value="1">';
echo "</div> </button>";
echo "</form>";
}

$REQ_ELEC= 'SELECT id_module_electricite, consommation, date_changement, 
consommation_max FROM module_electricite WHERE id_container = '.$idcont.' ORDER BY date_changement DESC LIMIT 1';
$requete1 = mysqli_query($connection, $REQ_ELEC);
$data_elec=mysqli_fetch_array($requete1);
echo "<script>console.log('" . json_encode($data_elec) . "');</script>";
if($data_elec!=null){
    echo '<form method="post" action="DetailModule.php">';
    echo '<button type="submit "style="width:350px" heigh="auto" name="btnEnvoiForm" title="Envoyer">
            <div class="project" style="background-image: url(images/img-1.jpg);">';
    echo "<h2>Modules Electricite</h2>";
    echo "<h3>Consommation: ".$data_elec["consommation"]."</h3>";
    echo "</div> </button>";
    echo "</form>";
}

$REQ_HAB = 'SELECT id_module_habitation, nombre_badge
, poid, nombre_appareil_electronique, nombre_connexion, date_changement
, nombre_badge_max,poid_max, nombre_appareil_electronique_max, nombre_connexion_max 
FROM module_habitation WHERE id_container = '.$idcont.' ORDER BY date_changement DESC LIMIT 1 ';
$requete2 = mysqli_query($connection, $REQ_HAB);
$data_hab=mysqli_fetch_array($requete2);
echo "<script>console.log('" . json_encode($data_hab) . "');</script>";
                                       
if($data_hab!=null){
    echo '<form method="post" action="DetailModule.php">';
echo '<button type="submit "style="width:350px" heigh="auto" name="btnEnvoiForm" title="Envoyer">
<div class="project" style="background-image: url(images/img-1.jpg);">';
    echo "<h2>Modules habitation</h2>";
    echo "<h3>Nombre de connexion: ".$data_hab["nombre_connexion"]."</h3>";
    echo "</div> </button>";
    echo "</form>";
    
}
                                    }
                                        ?>



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