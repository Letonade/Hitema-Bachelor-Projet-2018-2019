<?php
function ModuleElectricite_Insert($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'INSERT INTO module_electricite VALUES (
	'.sqlIntNull($obj->IdModuleElectricite()).'
	, '.sqlFloatNull($obj->Consommation()).'
	, '.sqlDateNull($obj->DateChangement()).'
	, '.sqlIntNull($obj->IdContainer()).')';
	if ($res = $connQuery->link->query($sql)) 
	{
		$obj->IdModuleElectricite(mysqli_insert_id($connQuery->link));
		$obj = ModuleElectricite_SelectOne($obj);
		unset($connQuery);
		return($obj);
	}else{unset($connQuery);
		return('error, insert failed.');
	}
}

function ModuleElectricite_Update($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'UPDATE module_electricite SET 
	id_module_electricite = '.sqlIntNull($obj->IdModuleElectricite()).'
	, consommation = '.sqlFloatNull($obj->Consommation()).'
	, date_changement = '.sqlDateNull($obj->DateChangement()).'
	, id_container = '.sqlIntNull($obj->IdContainer()).'
	WHERE 
	id_module_electricite = '.$obj->IdModuleElectricite().'
	';
	if ($res = $connQuery->link->query($sql)) {
		unset($connQuery);
		return($obj);
	}else{unset($connQuery);
		return('error, update failed.');
	}
}

function ModuleElectricite_Delete($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'DELETE FROM module_electricite WHERE 
	id_module_electricite = '.$obj->IdModuleElectricite().'
	';
	if ($res = $connQuery->link->query($sql)) {
		unset($connQuery);
		return(NULL);
	}else{unset($connQuery);
		return('error, delete failed.');
	}
}

function ModuleElectricite_SelectAll()
{
	$connQuery = new APP_BDD;
	$sql = 'SELECT * FROM module_electricite';
	$temp_coll = array();
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			$temp_obj = new ModuleElectricite;
			$temp_obj->IdModuleElectricite($val['id_module_electricite']);
			$temp_obj->Consommation($val['consommation']);
			$temp_obj->DateChangement($val['date_changement']);
			$temp_obj->IdContainer($val['id_container']);
			array_push($temp_coll, $temp_obj);
		}
		return $temp_coll;
	}
	else
	{
		unset($connQuery);
		return('error, select all failed.');
	}
	unset($connQuery);
	return(1);
}

function ModuleElectricite_SelectOne($obj)
{
	$connQuery = new APP_BDD;
	$temp_obj = new ModuleElectricite;
	$sql = 'SELECT * FROM module_electricite WHERE 
	id_module_electricite = '.$obj->IdModuleElectricite().'
	';
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			$temp_obj->IdModuleElectricite($val['id_module_electricite']);
			$temp_obj->Consommation($val['consommation']);
			$temp_obj->DateChangement($val['date_changement']);
			$temp_obj->IdContainer($val['id_container']);
		}
		return $temp_obj;
	}
	else
	{
		unset($connQuery);
		return('error, select one failed.');
	}
	unset($connQuery);
	return(1);
}

function ModuleElectricite_AllCol($obj)
{
	return('id_module_electricite
		, consommation
		, date_changement
		, id_container');
}

?>