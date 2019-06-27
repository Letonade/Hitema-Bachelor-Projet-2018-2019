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
				$temp_obj = CreateObject($module);
				$temp_obj->GetModule($val);
				
				array_push($temp_coll, $temp_obj);
			}
		return $temp_coll;
		}else{
			unset($connQuery);
			return('error, Select failed.');
		}
		unset($connQuery);
	}

	function Dernier_Details_Module($module, $vue, $container)
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
			  "ORDER BY date_changement DESC LIMIT 1";
		if ($res = $connQuery->link->query($sql)) {
			unset($connQuery);
			foreach ($res as $key => $val) 
			{
				$temp_obj = CreateObject($module);
				$temp_obj->GetModule($val);
			}
		return $temp_obj;
		}else{
			unset($connQuery);
			return('error, Select failed.');
		}
		unset($connQuery);
	}

	function Select_All_Container_By_Session()
	{
		// Dans cette requête on va chercher à récupérer tous les dépassement de chaque module 
		//	et leur nombre sur les dernières valeurs enregistré.
		$sql=
		"SELECT c.id_container, c.libelle, COUNT(allMod.id_container) as 'Nb_Alertes'
		FROM container AS c
		LEFT JOIN (
			SELECT * FROM (
				SELECT id_container,MAX(date_changement) ,'mh' 
				FROM module_habitation 
				WHERE nombre_badge > nombre_badge_max 
					OR nombre_connexion > nombre_connexion_max
					OR nombre_appareil_electronique > nombre_appareil_electronique_max
					GROUP BY id_container
				ORDER BY date_changement DESC
			) as module_habitation
			UNION 
			SELECT * FROM (
				SELECT id_container,MAX(date_changement) ,'mg' 
				FROM module_gaz 
				WHERE consommation > consommation_max
				GROUP BY id_container
				ORDER BY date_changement DESC
			) as module_gaz
			UNION 
			SELECT * FROM (
				SELECT id_container,MAX(date_changement) ,'me' 
				FROM module_electricite 
				WHERE consommation > consommation_max
				GROUP BY id_container
				ORDER BY date_changement DESC
			) as module_electrice
		)AS allMod ON allMod.id_container = c.id_container
		GROUP BY c.id_container";

		return $sql;
	}
	
	function CreateObject($module)
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

	function module_title($module)
	{
		/*$tab = explode("_",$module);
		$chaine = "";
		foreach($tab as $key => $val)
			$chaine .= " ".$val;
		$chaine = ucfirst($chaine)."<br>";
		return $chaine;*/
		$tab = explode("_",$module);
		$chaine = "";
		foreach($tab as $key => $val)
			{
				$chaine .= " ".ucfirst ($val);
			}
		return $chaine."</br>";
	}
?>