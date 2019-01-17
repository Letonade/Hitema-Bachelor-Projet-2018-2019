<?php
function ModuleElectricite_Insert($obj)
{
$connQuery = new APP_BDD;
$sql = 'INSERT INTO module_electricite VALUES (
'.sqlIntNull($obj->IdModule-elctricite()).'
, '.sqlFloatNull($obj->Consommation()).'
, '.sqlDateNull($obj->DateChangement()).'
)';
 if ($res = $connQuery->link->query($sql)) {
$obj->IdModule-elctricite(mysqli_insert_id($connQuery->link));
$obj = ModuleElectricite_SelectOne($obj);
unset($connQuery);
return($obj);
}else{unset($connQuery);
return('error, insert failed.');}
}

function ModuleElectricite_Update($obj)
{
$connQuery = new APP_BDD;
$sql = 'UPDATE module_electricite SET 
id_module-elctricite = '.sqlIntNull($obj->IdModule-elctricite()).'
, consommation = '.sqlFloatNull($obj->Consommation()).'
, date_changement = '.sqlDateNull($obj->DateChangement()).'
 WHERE 
id_module-elctricite = '.$obj->IdModule-elctricite().'
';
 if ($res = $connQuery->link->query($sql)) {
unset($connQuery);
return($obj);
}else{unset($connQuery);
return('error, update failed.');}
}

function ModuleElectricite_Delete($obj)
{
$connQuery = new APP_BDD;
$sql = 'DELETE FROM module_electricite WHERE 
id_module-elctricite = '.$obj->IdModule-elctricite().'
';
 if ($res = $connQuery->link->query($sql)) {
unset($connQuery);
return(NULL);
}else{unset($connQuery);
return('error, delete failed.');}
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
$temp_obj->IdModule-elctricite($val['id_module-elctricite']);
$temp_obj->Consommation($val['consommation']);
$temp_obj->DateChangement($val['date_changement']);
array_push($temp_coll, $temp_obj);
}
return $temp_coll;
}
else
{
unset($connQuery);
return('error, update failed.');
}
unset($connQuery);
return(1);
}

function ModuleElectricite_SelectOne($obj)
{
$connQuery = new APP_BDD;
$sql = 'SELECT * FROM module_electricite WHERE 
id_module-elctricite = '.$obj->IdModule-elctricite().'
';
if ($res = $connQuery->link->query($sql))
{
foreach ($res as $key => $val) {
$temp_obj = new ModuleElectricite;
$temp_obj->IdModule-elctricite($val['id_module-elctricite']);
$temp_obj->Consommation($val['consommation']);
$temp_obj->DateChangement($val['date_changement']);
}
return $temp_obj;
}
else
{
unset($connQuery);
return('error, update failed.');
}
unset($connQuery);
return(1);
}

function ModuleElectricite_AllCol($obj)
{
 return('id_module-elctricite
, consommation
, date_changement');}

?>