<?php
	function Affiche_Details_Module($module, $vue, $container)
	{
		
		$connQuery = new APP_BDD;
		//die(print_r(explode("_",$module),1));
		$sql="SELECT ". 
				$module.".*
			  FROM ". 
				  $module.
			  " INNER JOIN
				  container ON container.`id_container` = ".$module.".`id_container`
			  INNER JOIN 
				  many_vue_container ON ".$module.".`id_container`= many_vue_container.`id_container`  
			  WHERE
				  many_vue_container.`id_container` = ". $container.
			  " AND 
				  many_vue_container.`id_vue` = ".$vue;
				 
		 $temp_coll = array();

		if ($res = $connQuery->link->query($sql)) {
			unset($connQuery);
			
			foreach ($res as $key => $val) 
			{
				$temp_obj = create_object($module);
				$temp_obj->get_module($val);
				
				array_push($temp_coll, $temp_obj);
			}

		return $temp_coll;
		
		}else{unset($connQuery);
		return('error, update failed.');
	}
	unset($connQuery);
	}


function create_object($module)
{	
	$tab = explode("_",$module);
	$chaine = "";
	foreach($tab as $key => $val)
		{
			$chaine .= ucfirst ($val);
		}
		$tmp = new $chaine;
	return $tmp;
}

