<?php include './assets/inc/application_include.php'?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 56;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
  color: white;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
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

mysqli_fetch_array($requete);



?>
<div id='#id_container'><?php 
while($resultat=mysqli_fetch_array($requete)) {
    echo 'id_container_'. $resultat['id_container']."<br>"."<br>";

    
    
 
 }
?> 

<a href="#"><input type="button" value="deco" style="width:100px; height:30px;"></a>
</div>

</div>


  	</body>
</html>