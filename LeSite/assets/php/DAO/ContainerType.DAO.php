<?php
function ContainerType_Insert($obj)
{
$connQuery = new APP_BDD;
$sql = 'INSERT INTO container_type VALUES (
'.sqlIntNull($obj->IdContainerType()).'
, '.sqlStrNull($obj->ContainerTypeLibelle()).'
)';
 if ($res = $connQuery->link->query($sql)) {
$obj->IdContainerType(mysqli_insert_id($connQuery->link));
$obj = ContainerType_SelectOne($obj);
unset($connQuery);
return($obj);
}else{unset($connQuery);
return('error, insert failed.');}
}

function ContainerType_Update($obj)
{
$connQuery = new APP_BDD;
$sql = 'UPDATE container_type SET 
id_container_type = '.sqlIntNull($obj->IdContainerType()).'
, container_type_libelle = '.sqlStrNull($obj->ContainerTypeLibelle()).'
 WHERE 
id_container_type = '.$obj->IdContainerType().'
';
 if ($res = $connQuery->link->query($sql)) {
unset($connQuery);
return($obj);
}else{unset($connQuery);
return('error, update failed.');}
}

function ContainerType_Delete($obj)
{
$connQuery = new APP_BDD;
$sql = 'DELETE FROM container_type WHERE 
id_container_type = '.$obj->IdContainerType().'
';
 if ($res = $connQuery->link->query($sql)) {
unset($connQuery);
return(NULL);
}else{unset($connQuery);
return('error, delete failed.');}
}

function ContainerType_SelectAll()
{
$connQuery = new APP_BDD;
$sql = 'SELECT * FROM container_type';
$temp_coll = array();
if ($res = $connQuery->link->query($sql))
{
foreach ($res as $key => $val) {
$temp_obj = new ContainerType;
$temp_obj->IdContainerType($val['id_container_type']);
$temp_obj->ContainerTypeLibelle($val['container_type_libelle']);
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

function ContainerType_SelectOne($obj)
{
$connQuery = new APP_BDD;
$sql = 'SELECT * FROM container_type WHERE 
id_container_type = '.$obj->IdContainerType().'
';
if ($res = $connQuery->link->query($sql))
{
foreach ($res as $key => $val) {
$temp_obj = new ContainerType;
$temp_obj->IdContainerType($val['id_container_type']);
$temp_obj->ContainerTypeLibelle($val['container_type_libelle']);
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

function ContainerType_AllCol($obj)
{
 return('id_container_type
, container_type_libelle');}

?>