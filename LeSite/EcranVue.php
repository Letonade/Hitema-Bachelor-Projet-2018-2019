<?php include './assets/inc/application_include.php'; ?>
<?php 
  print_r(realpath("."));
?>
<html>        
    <head>
        <title>Accueil</title>
        <!-- Les includes communs -->
        <?php include $MyHomePath.'assets/inc/head.php'; ?>
        <!-- Les includes de groupes pour la page -->
        <script src="./assets/js/EcranVue.js"></script>
        <?php include $MyHomePath.'assets/inc/include_vue.php'; ?>
        <?php include $MyHomePath.'assets/inc/include_container.php'; ?>
        <?php include $MyHomePath.'assets/inc/include_allModule.php'; ?>
    </head>
	<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
          <section>
            <?php include $MyHomePath.'/assets/php/ContainerList.php'; ?>
          </section>
          <section id="TabTuile">
          </section>
	</body>
</html>