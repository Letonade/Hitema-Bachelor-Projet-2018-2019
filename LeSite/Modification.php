<?php 
$module=$_POST['Module'];
$sql="";
$connQuery = new APP_BDD;

if($module == "ModuleElectricite")
{
	$value1 = $_POST['consommation'];
	
	$sql="UPDATE  
			`module_electricite`
		  SET
			`consomation_max` = ".$valeur1."
		  WHERE 
		  	`id_module_electricite` = 1 ";
}
elseif($module == "ModuleGaz")
{
	$value1 = $_POST['consommation']
		$sql="UPDATE  
			`module_gaz`
		  SET
			`consomation_max` = ".$valeur1."
		  WHERE 
		  	`id_module_gaz` = 1 ";
}
elseif($module == "ModuleHabitation")
{
	$value1 = $_POST['nombre_badgage'];
	$value2 = $_POST['poid'];
	$value3 = $_POST['nombre_apareils'];
	$value4 = $_POST['nombre_connexion'];
	$sql="UPDATE  
			`module_HABITATION`
		  SET
			`nombre_badgage_max	` = "			 .$valeur1.",
			`poid_max` = "			 			 .$valeur2.",
			`nombre_apariel_electronique_max` = ".$valeur3.",
			`nombre_connexion_max	` = "        .$valeur4.",
		  WHERE 
		  	`id_module_habitation` = 1 ";
}
$connQuery->link->query($sql);
?>