<?php include './assets/inc/application_include.php'; ?>
<html>        
    <head>
        <title>Accueil</title>
        <!-- Les includes communs -->
        <?php include $MyHomePath.'assets/inc/head.php'; ?>
        <!-- Les includes de groupes pour la page -->
        <script src="./assets/js/connexion.js"></script>
        <?php include $MyHomePath.'assets/inc/include_allModule.php'; ?>
    </head>
	<body>
		<section class="login-block">
		<?php 

			//$container = $_POST['id_container'];
			//$module = $_POST['type_module'];
			//$vue = $_POST['id_vue'];

			$res = Affiche_Details_Module("module_gaz", 1, 1);
			while($row = $res->fetch()){

				foreach ($row as $key => $value) {

					echo $key." : ". $value;
					
				}
                                 
                }


			
			//$res = Affiche_Details_Module($module, $vue, $container);

			//echo $row['consomation'];

		?>

		</section>
	</body>
</html>