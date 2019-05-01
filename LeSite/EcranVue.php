<?php include './assets/inc/application_include.php' ?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: "Lato", sans-serif;
            margin-left: 160px !important;
        }
    </style>
    <title>Accueil</title>
    <!-- Les includes communs -->
    <?php include $MyHomePath . '/assets/inc/head.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CAPSA CONTAINER</a>
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Acceuil <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body text-center">
                <div id="grid">

                </div>
            </div>
        </div>
    </div>

    <div class="sidenav">
        <?php
        $connection = mysqli_connect("localhost", "root", "", "capsadomotique");
        // Contrôle sur la connexion
        $requete = mysqli_query($connection, "SELECT id_container FROM container");





        mysqli_fetch_array($requete);





        ?>
        <form method="GET">

            <select name="id_container" id="id_container" multiple>
                <?php 
                while ($resultat = mysqli_fetch_array($requete)) :; ?>

                <option value=$resultat['id_container']><?php echo 'id_container_' . $resultat['id_container']; ?> </option>
                <?php endwhile; ?>

            </select>


            <a href="connexion.php" style="text-aligne:center;width:80px; height:30px; margin-left:0px; "><input type="button" value="Deconexion" "></a>


</form>
</div>

<?php
$connection = new APP_BDD;
				
$requete = 'SELECT id_module_electricite,consommation, id_container, date_changement FROM module_electricite WHERE id_container = 1 ORDER BY date_changement DESC LIMIT 1';

if ($res = $connection->link->query($requete)){
    unset($connection);
    
    foreach($res as $key => $val){
        print($val["consommation"]);
    }

}
?>

  	</body>
</html> 