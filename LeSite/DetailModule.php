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
			//die(print_r($res,1));

			echo "<table style='border:1px solid black;'><tr>";
				foreach ($res as $idLine => $line) {
					echo "<td style='border:1px solid black;'>".$line->AfficherModuleGaz()."</td>";
				}
			echo "</tr></table>";


		?>

		</section>
	</body>
</html>