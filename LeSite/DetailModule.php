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

		$container 	= 1;
		$module 	= "module_habitation";
		$vue 		= 1;
/*
			$container = $_POST['id_container'];
			$module = $_POST['type_module'];
			$vue = $_POST['id_vue'];*/
			$res = Affiche_Details_Module($module, $vue, $container);
			
			echo "<table style='border:1px solid black;'>";
			$entete = 1;
			foreach ($res as $idLine => $line) {
				echo "<tr>".$line->AfficherModule($entete)."</tr>";
				$entete = 0;
			}
			echo "</table>";

		?>
		<form action="EcranVue.php" method="POST">
			<input id="RealViewId" name="vueId" type="hidden" value='<?php echo $vue ?>'>
			<input type="submit" value="Retour">
		</form>

		<form action="Modification.php" method="POST">
			<?php 
/*			$module = create_object($module);
			$temp= new $module;*/
			$formulaire= $line->AfficherFormModification();
			echo $formulaire; ?>
			<input type="hidden" id="container" name="container" value='<?php echo $vue ?>'>
			<input type="submit" value="valider">
		</form>

		</section>
	</body>
</html>