<?php
	function Affiche_Details_Module($module, $vue, $container)
	{
		$connQuery = new APP_BDD;
		$sql="select". 
				$module.".*
			  from". 
				  $module.
			  "INNER JOIN
				  container on container.`.id_container.` = module_electricite.`id_container`
			  INNER JOIN 
				  many_vue_container on module_electricite.`id_container`= many_vue_container.`id_container`  
			  where
				  many_vue_container.`id_container` =". $container.
			  "and 
				  many_vue_container.`id_vue` =".$vue;
		
		if ($res = $connQuery->link->query($sql)) {
			unset($connQuery);
			
		}else{unset($connQuery);
		return('error, update failed.');
	}
	unset($connQuery);
	}
