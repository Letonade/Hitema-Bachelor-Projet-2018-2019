<?php include './assets/inc/application_include.php'; ?>
<?php include $MyHomePath.'assets/inc/head.php'; ?>
<?php include $MyHomePath.'assets/inc/include_allModule.php'; ?>
<?php 

$module=$_POST['module'];
$container=$_POST['container'];
$sql="";
$connQuery = new APP_BDD;

if($module == "ModuleElectricite")
{
	$value1 = $_POST['consommation'];
	
	$sql="UPDATE  
			`module_electricite`
		  SET
			`consommation_max` = ".sqlIntZero($value1)."
		  WHERE 
		  	`id_container` = ".sqlIntZero($container);
}
elseif($module == "ModuleGaz")
{
	$value1 = $_POST['consommation'];
		$sql="UPDATE  
			`module_gaz`
		  SET
			`consommation_max` = ".sqlIntZero($value1)."
		  WHERE 
		  	`id_container` = ".sqlIntZero($container);
}
elseif($module == "ModuleHabitation")
{
	$value1 = $_POST['nombre_badgage'];
	$value2 = $_POST['poid'];
	$value3 = $_POST['nombre_apareils'];
	$value4 = $_POST['nombre_connexion'];
	$sql="UPDATE  
			`module_habitation`
		  SET
			`nombre_badge_max` = "			 	.sqlIntZero($value1).",
			`poid_max` = "			 			 	.sqlIntZero($value2).",
			`nombre_apariel_electronique_max` = "	.sqlIntZero($value3).",
			`nombre_connexion_max` = "        		.sqlIntZero($value4)."
		  WHERE 
		  	`id_container` = ".sqlIntZero($container);
}
$connQuery->link->query($sql);


echo "<script type='text/javascript'>document.location.replace('DetailModule.php');</script>";

?>