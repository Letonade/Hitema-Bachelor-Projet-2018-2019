<?php
function ModuleHabitation_Insert($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'INSERT INTO module_habitation VALUES (
	'.sqlIntNull($obj->IdModulehabitation()).'
	, '.sqlIntNull($obj->NombreBadge()).'
	, '.sqlIntNull($obj->Poid()).'
	, '.sqlIntNull($obj->NombreAppareilElectronique()).'
	, '.sqlIntNull($obj->NombreConnexion()).'
	, '.sqlDateNull($obj->DateChangement()).'
	, '.sqlIntNull($obj->IdContainer()).')';
	if ($res = $connQuery->link->query($sql)) 
	{
		$obj->IdModuleHabitation(mysqli_insert_id($connQuery->link));
		$obj = ModuleHabitation_SelectOne($obj);
		unset($connQuery);
		return($obj);
	}else{unset($connQuery);
		return('error, insert failed.');
	}
}

function ModuleHabitatio_Update($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'UPDATE module_habitation SET 
	id_module_habitation = '.sqlIntNull($obj->IdModuleHabitation()).'
	, nombre_badge = '.sqlIntNull($obj->NombreBadge()).'
	, poid = '.sqlIntNull($obj->Poid()).'
	, nombre_appareil_electronique = '.sqlIntNull($obj->NombreAppareilElectronique()).'
	, nombre_connexion = '.sqlIntNull($obj->NombreConnexion()).'
	, date_changement = '.sqlDateNull($obj->DateChangement()).'
	, id_container = '.sqlIntNull($obj->IdContainer()).'
	WHERE 
	id_module_habitation = '.$obj->IdModuleHabitation().'
	';
	if ($res = $connQuery->link->query($sql)) {
		unset($connQuery);
		return($obj);
	}else{unset($connQuery);
		return('error, update failed.');
	}
}

function ModuleHabitation_Delete($obj)
{
	$connQuery = new APP_BDD;
	$sql = 'DELETE FROM module_habitation WHERE 
	id_module_habitation = '.$obj->IdModuleHabitation().'
	';
	if ($res = $connQuery->link->query($sql)) {
		unset($connQuery);
		return(NULL);
	}else{unset($connQuery);
		return('error, delete failed.');
	}
}

function ModuleHabitation_SelectAll()
{
	$connQuery = new APP_BDD;
	$sql = 'SELECT * FROM module_habitation';
	$temp_coll = array();
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			$temp_obj = new ModuleHabitation;
			$temp_obj->IdModuleHabitation($val['id_module_habitation']);
			$temp_obj->Poid($val['poid']);
			$temp_obj->NombreBadge($val['nombre_badge']);
			$temp_obj->NombreAppareilElectronique($val['nombre_appareil_electronique']);
			$temp_obj->NombreConnexion($val['nombre_connexion']);
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

function ModuleHabitation_SelectOne($obj)
{
	$connQuery = new APP_BDD;
	$temp_obj = new ModuleHabitation;
	$sql = 'SELECT * FROM module_habitation WHERE 
	id_module_habitation = '.$obj->IdModuleHabitation().'
	';
	if ($res = $connQuery->link->query($sql))
	{
		foreach ($res as $key => $val) {
			$temp_obj->IdModuleGaz($val['id_module_habitation']);
			$temp_obj->Consommation($val['poid']);
			$temp_obj->Consommation($val['nombre_connexion']);
			$temp_obj->Consommation($val['nombre_appareil_electronique']);
			$temp_obj->Consommation($val['nombre_badge']);
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

function ModuleHabitation_AllCol($obj)
{
	return('id_module_habitation
		, poid
		, nombre_badge
		, nombre_appareil_electronique
		, nombre_connexion
		, date_changement
		, id_container');
}

?>