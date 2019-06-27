<?php include './assets/inc/application_include.php'; ?>
<?php include $MyHomePath.'assets/inc/head.php'; ?>
<?php include $MyHomePath.'assets/inc/include_allModule.php'; ?>
<?php 

$type_module=$_POST['type_module'];
$id_container=$_POST['id_container'];
$id_vue=$_POST['id_vue'];
$sql="";
$connQuery = new APP_BDD;

if($type_module == "module_electricite")
{
	$value1 = $_POST['consommation'];
	
	$sql="UPDATE  
			`module_electricite`
		  SET
			`consommation_max` = ".sqlIntZero($value1)."
		  WHERE 
		  	`id_container` = ".sqlIntZero($id_container);
}
elseif($type_module == "module_gaz")
{
	$value1 = $_POST['consommation'];
		$sql="UPDATE  
			`module_gaz`
		  SET
			`consommation_max` = ".sqlIntZero($value1)."
		  WHERE 
		  	`id_container` = ".sqlIntZero($id_container);
}
elseif($type_module == "module_habitation")
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
			`nombre_appareil_electronique_max` = "	.sqlIntZero($value3).",
			`nombre_connexion_max` = "        		.sqlIntZero($value4)."
		  WHERE 
		  	`id_container` = ".sqlIntZero($id_container);
}
//echo $sql;
$connQuery->link->query($sql);

echo 
'<form id="myBackForm" action="DetailModule.php" method="post">
<input type="hidden" id="id_container" name="id_container" value="'.$id_container.'">
<input type="hidden" id="type_module" name="type_module" 	value="'.$type_module.'">
<input type="hidden" id="id_vue" name="id_vue" 		value="'.$id_vue.'">
</form>
<script type="text/javascript">
    document.getElementById("myBackForm").submit();
</script>
';

//echo "<script type='text/javascript'>document.location.replace('DetailModule.php');</script>";

?>