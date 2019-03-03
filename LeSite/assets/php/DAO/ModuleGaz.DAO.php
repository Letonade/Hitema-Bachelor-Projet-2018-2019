<?php
function ModuleGaz_Insert($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'INSERT INTO module_gaz VALUES (
	'.sqlIntNull($obj->IdModuleGaz()).'
	, '.sqlFloatNull($obj->Consommation()).'
	, '.sqlDateNull($obj->DateChangement()).'
	, '.sqlIntNull($obj->IdContainer()).')';
	if ($res = $connQuery->link->query($sql)) 
	{
		$obj->IdModuleGaz(mysqli_insert_id($connQuery->link));
		$obj = ModuleGaz_SelectOne($obj);
		unset($connQuery);
		return($obj);
	}else{unset($connQuery);
		return('error, insert failed.');
	}
}

function ModuleGaz_Update($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'UPDATE module_gaz SET 
	id_module_gaz = '.sqlIntNull($obj->IdModuleGaz()).'
	, consommation = '.sqlFloatNull($obj->Consommation()).'
	, date_changement = '.sqlDateNull($obj->DateChangement()).'
	, id_container = '.sqlIntNull($obj->IdContainer()).'
	WHERE 
	id_module_gaz = '.$obj->IdModuleGaz().'
	';
	if ($res = $connQuery->link->query($sql)) {
		unset($connQuery);
		return($obj);
	}else{unset($connQuery);
		return('error, update failed.');
	}
}

function ModuleGaz_Delete($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'DELETE FROM module_gar WHERE 
	id_module_gar = '.$obj->IdModuleGaz().'
	';
	if ($res = $connQuery->link->query($sql)) {
		unset($connQuery);
		return(NULL);
	}else{unset($connQuery);
		return('error, delete failed.');
	}
}

function ModuleGaz_SelectAll()
{
	$connQuery = new APP_BDD;
	$sql = 'SELECT * FROM module_gaz';
	$temp_coll = array();
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			$temp_obj = new ModuleGaz;
			$temp_obj->IdModuleGaz($val['id_module_gaz']);
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

function ModuleGaz_SelectOne($obj)
{
	$connQuery = new APP_BDD;
	$temp_obj = new ModuleGaz;
	$sql = 'SELECT * FROM module_gaz WHERE 
	id_module_gaz = '.$obj->IdModuleGaz().'
	';
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			$temp_obj->IdModuleGaz($val['id_module_gaz']);
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

function ModuleGaz_AllCol($obj)
{
	return('id_module_gaz
		, consommation
		, date_changement
		, id_container');
}

?>