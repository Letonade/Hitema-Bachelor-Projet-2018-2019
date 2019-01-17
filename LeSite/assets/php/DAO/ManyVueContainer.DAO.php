<?php
function ManyVueContainer_Insert($obj)
{
$connQuery = new APP_BDD;
$sql = 'INSERT INTO many_vue_container VALUES (
'.sqlIntNull($obj->IdContainer()).'
, '.sqlIntNull($obj->IdVue()).'
, '.sqlDateNull($obj->DateAjout()).'
, '.sqlDateNull($obj->DateSortie()).'
)';
 if ($res = $connQuery->link->query($sql)) {
$obj->IdContainer(mysqli_insert_id($connQuery->link));
$obj = ManyVueContainer_SelectOne($obj);
unset($connQuery);
return($obj);
}else{unset($connQuery);
return('error, insert failed.');}
}

function ManyVueContainer_Update($obj)
{
$connQuery = new APP_BDD;
$sql = 'UPDATE many_vue_container SET 
id_container = '.sqlIntNull($obj->IdContainer()).'
, id_vue = '.sqlIntNull($obj->IdVue()).'
, date_ajout = '.sqlDateNull($obj->DateAjout()).'
, date_sortie = '.sqlDateNull($obj->DateSortie()).'
 WHERE 
id_container = '.$obj->IdContainer().'
 AND id_vue = '.$obj->IdVue().'
';
 if ($res = $connQuery->link->query($sql)) {
unset($connQuery);
return($obj);
}else{unset($connQuery);
return('error, update failed.');}
}

function ManyVueContainer_Delete($obj)
{
$connQuery = new APP_BDD;
$sql = 'DELETE FROM many_vue_container WHERE 
id_container = '.$obj->IdContainer().'
 AND id_vue = '.$obj->IdVue().'
';
 if ($res = $connQuery->link->query($sql)) {
unset($connQuery);
return(NULL);
}else{unset($connQuery);
return('error, delete failed.');}
}

function ManyVueContainer_SelectAll()
{
$connQuery = new APP_BDD;
$sql = 'SELECT * FROM many_vue_container';
$temp_coll = array();
if ($res = $connQuery->link->query($sql))
{
foreach ($res as $key => $val) {
$temp_obj = new ManyVueContainer;
$temp_obj->IdContainer($val['id_container']);
$temp_obj->IdVue($val['id_vue']);
$temp_obj->DateAjout($val['date_ajout']);
$temp_obj->DateSortie($val['date_sortie']);
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

function ManyVueContainer_SelectOne($obj)
{
$connQuery = new APP_BDD;
$sql = 'SELECT * FROM many_vue_container WHERE 
id_container = '.$obj->IdContainer().'
 AND id_vue = '.$obj->IdVue().'
';
if ($res = $connQuery->link->query($sql))
{
foreach ($res as $key => $val) {
$temp_obj = new ManyVueContainer;
$temp_obj->IdContainer($val['id_container']);
$temp_obj->IdVue($val['id_vue']);
$temp_obj->DateAjout($val['date_ajout']);
$temp_obj->DateSortie($val['date_sortie']);
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

function ManyVueContainer_AllCol($obj)
{
 return('id_container
, id_vue
, date_ajout
, date_sortie');}

?>