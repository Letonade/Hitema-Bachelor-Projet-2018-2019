<?php include './assets/inc/application_include.php'?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
  margin-left:160px !important;
}


</style>
        <title>Accueil</title>
        <!-- Les includes communs -->
        <?php include $MyHomePath.'/assets/inc/head.php'; ?>
    </head>
	<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          	<a class="navbar-brand" href="#">CAPSA CONTAINER</a>
          	<button class="navbar-toggler" type="button" >
            	<span class="navbar-toggler-icon"></span>
          	</button>
        
          	<div class="collapse navbar-collapse" id="navbarColor01">
            	<ul class="navbar-nav mr-auto" >
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
<a href='#'><?php  ?></a>
<?php
$connection=mysqli_connect("localhost", "root", "", "capsadomotique");
// Contrôle sur la connexion
$requete=mysqli_query($connection,"SELECT id_container FROM container");
$reqt=mysqli_query($connection,"SELECT id_vue FROM vue");
$rqt=mysqli_query($connection,"SELECT* FROM vue LIKE 'id_module%");

mysqli_fetch_array($requete);




?>
<div id='listc' ><?php 
while($resultat=mysqli_fetch_array($requete)) {
  
  if (onclick.$resultat){
echo ';';
  }
  
  ?>

  <a href="  <?php echo  $resultat['id_container']; ?> onclick() "id="id_container"><?php echo 'id_container_'. $resultat['id_container']."<br>"."<br>"; ?></a>

    
    
 
<?php } ?>

<a href="connexion.php" style="text-aligne:center;width:80px; height:30px; margin-left:0px; "><input type="button" value="Deconexion" "></a>
</div>

</div>
  	</body>
</html>