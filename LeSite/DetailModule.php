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
		$module 	= "module_gaz";
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

		
<?php
		$TEST_REQ = 'SELECT COUNT(DISTINCT id_module_habitation) as module_habitation ,
		 COUNT(DISTINCT id_module_gaz) as module_gaz ,
		 COUNT(DISTINCT id_module_electricite) as module_electricite  
		 FROM container
		 LEFT JOIN module_habitation ON module_habitation.id_container = container.id_container
		 LEFT JOIN module_gaz ON module_gaz.id_container = container.id_container
		 LEFT JOIN module_electricite ON module_electricite.id_container = container.id_container
		 WHERE container.id_container = 3';

		$connQuery = new APP_BDD;

		if ($res = $connQuery->link->query($TEST_REQ))
		{
			foreach ($res as $key => $val) 
			{
				foreach ($val as $k => $v) {
					if ($v > 0) {
						echo "<input type='text' name='consommation' id='consommation' value=".$k.">";
					}
					//print_r($v);
				}
			}
		}
		unset($connQuery);

		//print_r($res);


?>
		</section>
	</body>
</html>